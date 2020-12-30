<?php

session_start();
$_SESSION['username']="ahmad";
$user=$_SESSION['username'];

//if(isset($_SESSION['username'])){

$dsn='mysql:host=localhost;dbname=freelance';
		try {$dbuser='root';
		$pass='';
		$conn=new PDO($dsn,$dbuser,$pass);
		
		}catch(PDOException $e){
 							echo $e->getMessage;}

 						if($_SERVER['REQUEST_METHOD']=="POST")
							{


								try{

									$conn1 = new PDO($dsn,$dbuser,$pass);
									$q1=$conn1->prepare("SELECT count from user WHERE username=\"ahmad\"");
									$q1->execute();
									$count=$q1->fetchColumn();
							
									$count=$count+1;
									
									$q3=$conn1->prepare("UPDATE user SET count=\"$count\" WHERE username=\"ahmad\"");
									$q3->execute();

									$name=$_POST['name'];
									$user=$_SESSION['username'];
									$details=$_POST['details'];
									$projectname="project" . $count;

									mkdir("users\\".$user."\\projects\\".$projectname);
									fopen("users\\".$user."\\projects\\".$projectname."\\details.txt","w");
									file_put_contents("users\\".$user."\\projects\\".$projectname."\\details.txt",$details);

									$date=date("Y-m-d");
									$time=date("H-i-s");
									$datetime=$date . " " . $time;
									$cost=$_POST['cost'];
									$file="ahmad";
									$desc="users\\".$user."\\projects\\".$projectname."\\details.txt";

									$desc1=addslashes($desc);
								
 						$conn1 = new PDO($dsn,$dbuser,$pass);
 						$q3 ="INSERT INTO request (user_id,description,caption,datetim,cost) VALUES (\"$user\",\"$desc1\",\"$name\",\"$datetime\",\"$cost\")";

 						$conn1->exec($q3);
 						//header("Location: http://localhost/freelance/index.php");
 						}catch(PDOException $e){
 							{echo $e->getMessage;}

					 }
							}

					//	}
					//else{
						//header("Location: http://localhost/freelance/index.php");
					//}


?>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Freelance</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/post.css">
</head>
<body class="b">

	<div class="header">
		<div class="a container">
	
		<div class="logo">
			<h1>
				logo
			</h1>
		</div>
		<div class="title">
			<h2>
				Tell us what you need done
			</h2>
		</div>
		<div class="para">
			<h6>
				Contact skilled freelancers within minutes.<br> View profiles, ratings, portfolios and chat with them. Pay the freelancer only when you are 100% satisfied with their work.
			</h6>
		</div>
		</div>
	</div>
	<div class="main container">
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"  enctype="multipart/form-data" class="f">
			<label>
				<h4>
				Choose a name for your project
				</h4>
			</label>
			<input type="text" name="name" class="form-control" placeholder="e.g build me a website">

			<label>
				<h4>
				Tell us more about your project
				</h4>

			</label>
			<label>
				<h6>
				Start with a bit about yourself or your business.
				</h6>
			</label>
			<textarea name="details" rows="8" class="form-control" placeholder="describe your project here"></textarea>

			<label>
				<h4>
				What is your estimated budget?
				</h4>

			</label>

			<input type="text" name="cost" class="form-control" placeholder="S.P">

			<input type="file" name="file" class="form-control file" multiple="multiple" >

			<div class="last">

			<input type="submit" name="submit" class="btn btn-primary" >
			<h5 class="h">Press CTRL + ENTER</h5>
			</div>
		</form>
	</div>

<script src="js/jquery-1.12.4.min.js"></script>
	 <!--Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

	<script src="js/post.js"></script>
</body>
</html>