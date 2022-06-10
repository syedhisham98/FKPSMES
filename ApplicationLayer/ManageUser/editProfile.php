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
		$student = new studentController();
		$data = $student->viewStudent($student_id);
		if(isset($_POST['update'])){
			$student->editStudent();
			$_SESSION['username']=$_POST['username'];
		}
	} else if ($usertype == 2) {
		$lecturer_id = $_GET['lecturer_id'];
		$table_id = "lecturer_";
		$lecturer = new lecturerController();
		$data = $lecturer->viewlecturer($lecturer_id);
		if(isset($_POST['update'])){
			$lecturer->editlecturer();
			$_SESSION['username']=$_POST['username'];
		}
	} else if ($usertype == 3) {
		$secretariat_id = $_GET['secretariat_id'];
		$table_id = "secretariat_";
		$secretariat = new secretariatController();
		$data = $secretariat->viewSecretariat($secretariat_id);
		if(isset($_POST['update'])){
			$secretariat->editSecretariat();
			$_SESSION['username']=$_POST['username'];
		}
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
<?php include"../../includes/head.php";?>
<style>
input {
  border-style: solid;
  border-color: grey;
}
</style>

<body>
	<div class="wrapper" id="wrapper">
		<?php 
		include "../../includes/header.php";
		?>

		 <div style="background-image: url('../../images/profile.jpg');">


	</div>
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<section class="type__category__area bg--white section-padding--lg">
	<div class="wrapper wrapper--w790">
		<div class="card card-5">
			<div class="card-heading">
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
						<div class='form-row'>
							<div class='name'>Name: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="name" value="<?=$row[''.$table_id.'name']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Email: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="email" name="email" value="<?=$row[''.$table_id.'email']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Phone No.: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="phone" value="<?=$row[''.$table_id.'phone']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Matric ID.: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="phone" value="<?=$row[''.$table_id.'matric']?>" >
								</div>
							</div>
						</div>	
						<div class='form-row'>
							<div class='name'>Project Tittle: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="phone" value="<?=$row[''.$table_id.'project']?>" >
								</div>
							</div>
						</div>					
												
						<div class='form-row'>
							<div class='name'>Username: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="username" value="<?=$row['username']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Password: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="password" value="<?=$row['password']?>" >
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
				<center>
				<input type="button" onclick="window.location.href='editProfile.php';" value="UPDATE" name="update"/> 
				<input type="button" onclick="window.location.href='profile.php';" value="Back" />
			</center>
				</div>
			</form>
		</center>
	</section>
	<?php
}
include "../../includes/footer.php";
?>
</div><!-- //Main wrapper -->
<!-- JS Files -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
</body>
</html>