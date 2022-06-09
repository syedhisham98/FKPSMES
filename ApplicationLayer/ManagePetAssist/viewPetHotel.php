<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
session_start();

$hotel_id = $_GET['hotel_id'];
$pethotel = new pethotelController();
$cart = new cartController();
$data = $pethotel->viewpethotel($hotel_id); 
$name = $_GET['hotel_id'];

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

    if (isset($_POST ['buy'])) {
    $cart->add();
  }
    if (isset($_POST ['delete'])) {
    $petgroom->delete();
  }




?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
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

<!-- CONTENT -->   
<form method="post">
<main class="product-container">

<?php foreach($data as $row){ ?> 
    <div class="left-column">       
        <img src="../../img/<?php echo $row['hotel_image'];?>">   
    </div>

    <div class="right-column">

        <div class="product-description">
            <span>Pet Hotel</span>
            <h1><?=$row['hotel_name']?></h1>
            <p><?=$row['hotel_details']?></p>    
        </div>

        <div class="product-price">
            <span>RM <?=$row['hotel_price']?></span>
        </div>
        <br>
        <?php
                  if ($_SESSION['usertype'] == 1) {
                    ?>
                    <input type="hidden" name="name" value="<?=$row['hotel_name']?>">
                    <input type="hidden" name="price" value="<?=$row['hotel_price']?>">
                    <input type="hidden" name="image" value="<?=$row['hotel_image']?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?=$row['hotel_price']?>">
                    <button class="cart-btn" type="submit" name="buy" value="Add to Cart"> Add to Cart </button>
                    <button class="cart-btn" formaction="petHotel.php">Back</button>
                    <?php
                  } elseif ($_SESSION['usertype'] == 2){ ?>
                    <button class="cart-btn"> <a href="editPetHotel.php?hotel_id=<?=$row['hotel_id']?>">Edit</a></button>
                    <input type="hidden" name="hotel_id" value="<?=$row['hotel_id']?>">
                    <button class="cart-btn" ><a href="petHotel.php">Back</a></button>
                    <button class="del-btn" type="submit" name="delete" value="Delete"> Delete </button>

                    <?php
                  }?>
    </div>
         
</main>
<?php }?>
</form>  

<?php include "../../includes/footer.php"; ?>


</body>
</html>