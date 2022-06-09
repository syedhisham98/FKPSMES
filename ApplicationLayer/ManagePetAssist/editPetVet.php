<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
session_start();
$vet_id = $_GET['vet_id'];

$petvet = new petvetController();

$data = $petvet->viewpetvet($vet_id);

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['update'])){
  $petvet->editpetvet();
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

<h1 class="addtittle">Edit Pet Veterinary Services</h1>

<!-- BACKGROUND -->

<!-- CONTENT -->

<div class="addcontainer">
  <form action="" method="POST">
  <?php
    foreach($data as $row){
  ?>
  <center><img src="../../img/<?php echo $row['vet_image'];?>" height="130" width="150"></center> 
  <br>

  <div class='row'>
      <div class='col-25'>
      <label class='name'>ID </label>
      </div>
          <div class='col-75'>
              <input type="text" name="vet_id" value="<?=$row['vet_id']?>" readonly>
          </div>
      
  </div>

  <div class="row">
    <div class="col-25">
      <label for="name">Shop Name</label>
    </div>
    <div class="col-75">
      <input type="text"  name="name" value="<?=$row['vet_name']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text"  name="price" value="<?=$row['vet_price']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="quantity">Quantity</label>
    </div>
    <div class="col-75">
      <input type="text"  name="quantity" value="<?=$row['vet_quantity']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Shop Details</label>
    </div>
    <div class="col-75">
      <input type="text" name="details" value="<?=$row['vet_details']?>"></input>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Image</label>
    </div>
      <div class="col-75">
          <input type="file" name="image" value="<?=$row['vet_image']?>">      
      </div>
  </div>

  <div class="row">
 
    <button class="up-btn" type="submit" value="UPDATE" name="update">Update</button>
    <button class="up-btn"><a href="viewPetVet.php">Back</button>

  </div>
  <?php } ?>
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