<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
session_start();

$petvet = new petvetController();
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['add'])){
  $petvet->add();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="../../img/RMS.png"/>
<title>Runner Management System</title>
<?php include"../../includes/head.php";?>


</head>

<body>

<!-- NAVBAR -->
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

<h1 class="addtittle">Add Pet Veterinary Services</h1>

<!-- BACKGROUND -->

<!-- CONTENT -->

<div class="addcontainer">
  <form action="" method="POST">

  <div class="row">
    <div class="col-25">
      <label for="name">Shop Name</label>
    </div>
    <div class="col-75">
      <input type="text"  name="name" placeholder="Enter Pet Groom Name...">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text"  name="price" placeholder="Enter the price">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="quantity">Quantity</label>
    </div>
    <div class="col-75">
      <input type="text"  name="quantity" placeholder="Enter the quantity">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Shop Details</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="details" placeholder="Write shop details description.." 
      style="height:100px"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Image</label>
    </div>
      <div class="col-75">
          <input type="file" name="image" class="" required>      
      </div>
    </div>
  </div>

  <div class="row">
    <div class="addsubmit">
    <input type="reset" value="Reset">
    <input type="submit" value="Submit" name="add">  
    </div>
  </div>
  
  </form>  
</div>

<!-- FOOTER -->
<div class="footer">
  <div>
  <p>All Right Reserved Marverick &#8482;</p>
  </div> 
</div>

</body>
</html>