<?php
session_start();
$dsn='mysql:host=localhost;dbname=freelance';
		try {$dbuser='root';
		$pass='';
		$conn=new PDO($dsn,$dbuser,$pass);
		$q1=$conn->prepare("SELECT * from question");
		$q1->execute();
		$result = $q1->fetchAll();
		$q2=$conn->prepare("SELECT COUNT(*) from question");
		$q2->execute();
		$count=$q2->fetchColumn();

		}catch(PDOException $e){
 							echo $e->getMessage;}

 						if($_SERVER['REQUEST_METHOD']=="POST")
							{


								try{
									$user=$_POST['username'];
									$pass1=$_POST['pass'];
									$mail=$_POST['email'];
									$picture="ahmad";
									$ans=$_POST['ans'];
									mkdir("users\\".$user);
									mkdir("users\\".$user."\\profile");
									mkdir("users\\".$user."\\projects");
 						$conn1 = new PDO($dsn,$dbuser,$pass);
 						$q3 ="INSERT INTO user (username,password,Email,picture,answer1) VALUES (\"$user\",\"$pass1\",\"$mail\",\"$picture\",\"$ans\")";

 						$conn1->exec($q3);
 						header("Location: http://localhost/freelance/index.php");
 						}catch(PDOException $e){
 							{echo $e->getMessage;}

					 }
							}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Signup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/signup.css">
</head>
<body>

	

		<div class="container">
			<div class="header">
				<h2>
					Syrian Freelancers
				</h2>
				<h1>
					SignUp
				</h1>
			</div>
			<div class="form">
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
					<div>
						<input type="text" name="username" class="user form-control" placeholder="username">
						<i class="fa fa-user fa-fw"></i>
						<div class="alert alert-danger custom-alert">
						username must be more than <strong>4</strong>characters
						</div>
					</div>

					<div>
						<input type="password" name="pass" class="pass form-control" placeholder="password">
						<i class="fa fa-user-secret fa-fw"></i>
						<div class="alert alert-danger custom-alert">
						password must be between <strong>8 </strong>and <strong>6</strong>
						</div>
					</div>

					<div>
						<input type="password" name="confpass" class="confpass form-control" placeholder="confirm password" >
						<i class="fa fa-user-secret fa-fw"></i>
						<div class="alert alert-danger custom-alert">
						there is no <strong>match</strong>
						</div>
					</div>

					<div>
						<input type="email" name="email" class="email form-control" placeholder="email">
						<i class="fa fa-envelope fa-fw"></i>
						<div class="alert alert-danger custom-alert">
						username must be more than <strong>4</strong>characters
						</div>
					<div>

					<select class="form-control">

						<?php
						for ($i=0; $i <$count ; $i++) { 
							echo "<option>
							";echo $result[$i]['ques'];  echo "
						</option>";

						}


						?>

					</select>
					<i class="fa fa-question fa-fw"></i>

					<div>
						<input type="" name="ans" class="ans form-control" placeholder="your answer">
						<i class="fa fa-check fa-fw"></i>
						<div class="alert alert-danger custom-alert">
						answer must not be <strong>Empty</strong>
						</div>
					</div>


					<input type="file" name="pic" class="custom-file-input" >

					<input type="submit" name="confirm" class="btn btn-danger" value="Sign Up">

				</form>
		
		</div>

	<script src="js/jquery-1.12.4.min.js"></script>
	 <!--Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

	<script src="js/signup.js"></script>
</div>
</body>
</html>