<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
session_start();
$hotel_id = $_GET['hotel_id'];

$pethotel = new pethotelController();

$data = $pethotel->viewpethotel($hotel_id);

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['update'])){
  $pethotel->editpethotel();
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

<h1 class="addtittle">Edit Pet Hotel Services</h1>

<!-- BACKGROUND -->

<!-- CONTENT -->

<div class="addcontainer">
  <form action="" method="POST">
  <?php
    foreach($data as $row){
  ?>
  <center><img src="../../img/<?php echo $row['hotel_image'];?>" height="130" width="150"></center> 
  <br>

  <div class='row'>
      <div class='col-25'>
      <label class='name'>ID </label>
      </div>
          <div class='col-75'>
              <input type="text" name="hotelID" value="<?=$row['hotel_id']?>" readonly>
          </div>
      
  </div>

  <div class="row">
    <div class="col-25">
      <label for="name">Shop Name</label>
    </div>
    <div class="col-75">
      <input type="text"  name="name" value="<?=$row['hotel_name']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text"  name="price" value="<?=$row['hotel_price']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="quantity">Quantity</label>
    </div>
    <div class="col-75">
      <input type="text"  name="quantity" value="<?=$row['hotel_quantity']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Shop Details</label>
    </div>
    <div class="col-75">
      <input type="text" name="details" value="<?=$row['hotel_details']?>"></input>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Image</label>
    </div>
      <div class="col-75">
          <input type="file" name="image" value="<?=$row['hotel_image']?>">      
      </div>
  </div>

  <div class="row">
 
    <button class="up-btn" type="submit" value="UPDATE" name="update">Update</button>
    <button class="up-btn"><a href="viewPetHotel.php">Back</button>

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