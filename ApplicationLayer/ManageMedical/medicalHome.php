<?php
session_start();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../../ManageLogin/login.php';</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>RMS</title>
<?php include"../../includes/head.php";?>
</head>

<body>


  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="wrapper wrapper--w790">
  <div class="card card-5">
    <div class="card-heading">
      <h2 class="title">Medical Delivery Services</h2>
    </div>
    <div class="card-body">
      <?php
      if ($_SESSION['usertype'] == 1) {
        ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--black"> <a href="medicineList.php">Medicine List</a></button>
          </center>
        </div>
        <?php
      } elseif ($_SESSION['usertype'] == 2) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--black"> <a href="addMedicine.php">Add Medicine</a></button>
          </center>
        </div>
        <br></br>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--black"> <a href="medicineList.php">Manage Medicine</a></button>
          </center>
        </div> 
        <?php
      } ?>

    </div>
  </div>
</div>


</section>

<!--FOOTER-->
<div class="footer">
	<div class="foot">
	<p>All Right Reserved Marverick &#8482;</p>
	</div>
</div>



</body>
</html>
