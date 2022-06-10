<?php
require_once '../../BusinessServiceLayer/controller/studentController.php';
require_once '../../BusinessServiceLayer/controller/lecturerController.php';
require_once '../../BusinessServiceLayer/controller/secretariatController.php';
session_start();
$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];

if ($usertype == 1) {
	$student_id = $_GET['student_id'];
	$table_id = "student_";
	$customer = new studentController();
	$data = $customer->viewStudent($student_id); 
	
}
else if ($usertype == 2) {
	$lecturer_id = $_GET['lecturer_id'];
	$table_id = "lecturer_";
	$provider = new lecturerController();
	$data = $provider->viewlecturer($lecturer_id); 
}
else if ($usertype == 3) {
	$secrectariat_id = $_GET['secrectariat_id'];
	$table_id = "secrectariat_";
	$runner = new secretariatController();
	$data = $runner->viewSecretariat($secrectariat_id); 
}



if (!isset($_SESSION['username'])) {
	$message = "You must log in first";
	header('refresh:5; url=login.php');
	echo "<script type='text/javascript'>alert('$message');
	window.location = '../view';</script>";
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<link rel="icon" href="../../img/RMS.png"/>
<title>Runner Management System</title>
<?php include"../../includes/head.php";?>
</head>
<style>
input {
  border-style: solid;
  border-color: grey;
}
</style>

<body>
	<div class="wrapper" id="wrapper">
	<div class="wrapper" id="wrapper">
    <?php 
    if ($_SESSION['usertype'] == 3){
      include "../../includes/headerR.php";

    }else if ($_SESSION['usertype'] == 2){
      include "../../includes/headerP.php";

    }else{
      include "../../includes/header.php";
    }
    ?>

<section class="type__category__area bg--white section-padding--lg">
	<div class="wrapper wrapper--w790">
		<div class="profilecard card-5">
			<div class="profilecard-heading">
				<?php if ($usertype == 1) { ?>
					<h2 class="title">Student Profile</h2>
				<?php } else if ($usertype == 2) { ?>
					<h2 class="title">Lecturer Profile</h2>
				<?php } else if ($usertype == 3) { ?>
					<h2 class="title">Secretariat Profile</h2>
				<?php } ?>
					</div>
					<div class="addcontainer">
					<form action="" method="POST">
					<?php
					foreach($data as $row){
						?>
						<div class='row'>
							<div class='col-25'>
							<label for="name">Fullname</label>
							</div>
						
								<div class='col-75'>
									<?=$row[''.$table_id.'name']?>
								</div>
						
						</div>
						<div class='row'>
						<div class='col-25'>
							<label for="name">Email</label>
							</div>
						
								<div class='col-75'>
									<?=$row[''.$table_id.'email']?>
								</div>
						
						</div>
						
						<div class='row'>
						<div class='col-25'>
							<label for="name">Phone Number</label>
							</div>							
						
								<div class='col-75'>
									<?=$row[''.$table_id.'phone']?>
								</div>
						
						</div>

						<div class='row'>
						<div class='col-25'>
							<label for="name">Lecturer Expertise</label>
							</div>							
						
								<div class='col-75'>
									<?=$row[''.$table_id.'expertise']?>
								</div>
						
						</div>	

						

							<div class='row'>
						<div class='col-25'>
							<label for="name">Matric ID</label>
							</div>							
						
								<div class='col-75'>
									<?=$row[''.$table_id.'matric']?>
								</div>
						
						</div>
						

						<div class='row'>
						<div class='col-25'>
							<label for="name">Username</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row['username']?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
      			<input type="button" onclick="window.location.href='stdAddSchedule.php';" value="Add Schedule" /> 
	  			<input type="button" onclick="window.location.href='stdSchedule.php';" value="Update Schedule" />
  
			</form>
		</center>

		
	</section>
	<?php
}

?>
<?php
include "../../includes/footer.php";
?>
</body>
</html>