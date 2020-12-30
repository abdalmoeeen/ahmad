<?php
	
	$dbuser='root';
	$dsn='mysql:host=localhost;dbname=freelance';
	$pass='';
	$conn=new PDO($dsn,$dbuser,$pass);
	$q1=$conn->prepare("SELECT * from request");
	$q1->execute();
	$result=$q1->fetchAll();
	$q2=$conn->prepare("SELECT COUNT(*) from request");
	$q2->execute();
	$count=$q2->fetchColumn();



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
	<link rel="stylesheet" href="css/browse.css">
</head>
<body>

	<header>
		
	</header>

	<div class="container">
		<div class="row">
			<div class="col-md-3 first">
				<header>
					<h4>Filter by :</h4>
				</header>

				<div class="filter">
					<h5 style="font-weight: bold;">
						Budget
					</h5>
					<div>
						<input type="text" name="min" class="min form-control" placeholder="min" style="display: inline;">
						to
						<input type="text" name="max" class="max form-control" placeholder="max" style="display: inline;">
					</div>
				</div>
				<hr style="border-top: 2px solid #c1c8c8">
				<div class="filter">
					<h5 style="font-weight: bold;">
						Skills
					</h5>
					<div>
						<ul>
							<li>
								<input id="ch1" type="checkbox" name="skill-set1">
								<label for="ch1">
									java
								</label>
							</li>
							<li>
								<input id="ch2" type="checkbox" name="skill-set2">
								<label for="ch2">
									c++
								</label>
							</li>
							<li>
								<input id="ch3" type="checkbox" name="skill-set3">
								<label for="ch3">
									php
								</label>
							</li>
							<li>
								<input id="ch4" type="checkbox" name="skill-set4">
								<label for="ch4">
									html
								</label>
							</li>
							<li>
								<input id="ch5" type="checkbox" name="skill-set5">
								<label for="ch5">
									css
								</label>
							</li>
						</ul>
					</div>
				</div>
				<div class="filter">
					
				</div>
				
			</div>
			<div class="col-md-8  second">
				<select class="se">
					<option value="0">
						Newest first
					</option>
					<option value="1">
						Lowest budget first
					</option>
					<option value="2">
						Highest budget first
						
					</option>
				</select>

				<hr style="border-top: 2px solid #c1c8c8">
				<?php 
				for ($i=0; $i < $count; $i++) { 
					
				echo "
				
				<div class=\"card-item\">
					<div class=\"card-item-inner\">
						<div class=\"primary\">
							<div>
								<h3 style=\"font-weight: bold; margin-top: 0px;\">
									";echo $result[$i]['caption'];
									 ;echo "
								</h3>
							</div>
							<p>
								";echo file_get_contents($result[$i]['description']); echo"

							</p>
							<div>
								skills 
							</div>
						</div>
						<div class=\"secondary\">
							<div>
								";echo "budget is " . $result[$i]['cost'] . " S.P" ;
									 ;echo "
							</div>
							
						</div>
					</div>
					
				</div>
			";}
				?>
					
				

			</div>
		</div> 
	</div>



<script src="js/jquery-1.12.4.min.js"></script>
	 <!--Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

	<script src="js/browse.js"></script>
</body>
</html>