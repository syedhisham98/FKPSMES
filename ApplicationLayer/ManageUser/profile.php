<?php
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/providerController.php';
require_once '../../BusinessServiceLayer/controller/runnerController.php';
session_start();
$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];

if ($usertype == 1) {
	$customer_id = $_GET['customer_id'];
	$table_id = "customer_";
	$customer = new customerController();
	$data = $customer->viewCustomer($customer_id); 
	
}
else if ($usertype == 2) {
	$sp_id = $_GET['sp_id'];
	$table_id = "sp_";
	$provider = new providerController();
	$data = $provider->viewProvider($sp_id); 
}
else if ($usertype == 3) {
	$runner_id = $_GET['runner_id'];
	$table_id = "runner_";
	$runner = new runnerController();
	$data = $runner->viewRunner($runner_id); 
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
</div>

    	<h2 class="bradcaump-title">User Profile</h2>
             
            

	</div>


<section class="type__category__area bg--white section-padding--lg">
	<div class="wrapper wrapper--w790">
		<div class="profilecard card-5">
			<div class="profilecard-heading">
				<?php if ($usertype == 1) { ?>
					<h2 class="title">Customer Profile</h2>
				<?php } else if ($usertype == 2) { ?>
					<h2 class="title">Provider Profile</h2>
				<?php } else if ($usertype == 3) { ?>
					<h2 class="title">Runner Profile</h2>
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
							<label for="name">Address</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row[''.$table_id.'address']?>
								</div>
							</div>
						</div>
						<div class='row'>
						<div class='col-25'>
							<label for="name">City</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row[''.$table_id.'city']?>
								</div>
							</div>
						</div>
						<div class='row'>
						<div class='col-25'>
							<label for="name">State</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row[''.$table_id.'state']?>
								</div>
							</div>
						</div>
						<div class='row'>
						<div class='col-25'>
							<label for="name">Zipcode</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row[''.$table_id.'zipcode']?>
								</div>
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
						<div class='row'>
						<div class='col-25'>
							<label for="name">Passowrd</label>
							</div>
							<div class='value'>
								<div class='col-75'>
									<?=$row['password']?>
								</div>
							</div>
						</div>
					</div>
				</div>
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