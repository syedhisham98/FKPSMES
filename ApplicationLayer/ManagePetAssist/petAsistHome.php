<?php
session_start();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageLogin/login.php';</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" href="../../img/RMS.png"/>
<title>Runner Management System</title>
<?php include"../../includes/head.php";?>
<link href="../../asset/pet.css" rel="stylesheet" media="all">

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


<h1>Pet Assist Home</h1>

<!-- BACKGROUND -->

<!-- CONTENT -->

<table>
<tr>
<th colspan="3"></th>
</tr>

<tr>
<th>
<form method="post">
<div class="petcard">
  <img src="../../img/grooming.jpeg" alt="Pet groom" width = "350" height="300" >
  <div class="desc">
  <h2>Pet Grooming</h2>
  <p>Affordable grooming services to 
    help keep your pets looking and feeling their best. Make your appointment today at the Pet Grooming Services listed.</p>
</div>
<?php
      if ($_SESSION['usertype'] == 1) {
        ?>
    <p><button type="submit" formaction="petGroom.php">Pet Grooming Services</button></p>

    <?php
      } elseif ($_SESSION['usertype'] == 2) { ?>
    <p><button type="submit" formaction="addPetGroom.php">Add Pet Grooming Services</button></p>
    <p><button type="submit" formaction="petGroom.php">Pet Grooming Services</button></p>

    <?php
      }elseif ($_SESSION['usertype'] == 3) { ?>
    <p><button type="submit" formaction="petGroom.php">Pet Grooming Services</button></p>
    <?php
      } ?>
</div>
</th>

<th>
<div class="petcard">
  <img src="../../img/hotel.jpg" alt="Pet hotel" width = "350" height="300">
  <div class="desc">
    <div class="hotel">
  <h2>Pet Hotel</h2>
  <p>Ultimate pet destination built exclusively for urban dogs and cats. Start booking today for your pet at the Pet Hotel Services available.</p>
  </div>
</div>
<?php
      if ($_SESSION['usertype'] == 1) {
        ?>
    <p><button type="submit" formaction="petHotel.php">Pet Hotel Services</button></p>

    <?php
      } elseif ($_SESSION['usertype'] == 2) { ?>
    <p><button type="submit" formaction="addPetHotel.php">Add Pet Hotel Services</button></p>
    <p><button type="submit" formaction="petHotel.php">Pet Hotel Services</button></p>

    <?php
      }elseif ($_SESSION['usertype'] == 3) { ?>
    <p><button type="submit" formaction="petHotel.php">Pet Hotel Services</button></p>
    <?php
      } ?></div>
</th>

<th>
<div class="petcard">
  <img src="../../img/vet.jpg" alt="Pet vet" width = "350" height="300">
  <div class="desc">
    <div class="vet">
  <h2>Pet Veterinary</h2>
  <p>Provide go-to place for veterinary surgery, 
    emergency vet services, preventive care and other related services. Make your appointment today at the Pet Veterinary Services listed.</p>
    </div>
  </div>
  <?php
      if ($_SESSION['usertype'] == 1) {
        ?>
    <p><button type="submit" formaction="petVet.php">Pet Veterinary Services</button></p>

    <?php
      } elseif ($_SESSION['usertype'] == 2) { ?>
    <p><button type="submit" formaction="addPetVet.php">Add Pet Veterinary Services</button></p>
    <p><button type="submit" formaction="petVet.php">Pet Veterinary Services</button></p>

    <?php
      }elseif ($_SESSION['usertype'] == 3) { ?>
    <p><button type="submit" formaction="petVet.php">Pet Veterinary Services</button></p>
    <?php
      } ?></div>
</form>
</th>

</tr>
</table>

<!-- FOOTER -->
<div class="footer">
  <div class="foot">
  <p>All Right Reserved Marverick &#8482;</p>
  </div> 
</div>

</body>
</html>