<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
session_start();

$groom_id = $_GET['groom_id'];
$petgroom = new petgroomController();
$cart = new cartController();
$data = $petgroom->viewpetgroom($groom_id); 
$name = $_GET['groom_id'];

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
        <img src="../../img/<?php echo $row['groom_image'];?>">   
    </div>

    <div class="right-column">

        <div class="product-description">
            <span>Pet Grooming</span>
            <h1><?=$row['groom_name']?></h1>
            <p><?=$row['groom_details']?></p>    
        </div>

        <div class="product-price">
            <span>RM <?=$row['groom_price']?></span>
        </div>
        <br>
        <?php
                  if ($_SESSION['usertype'] == 1) {
                    ?>
                    <input type="hidden" name="name" value="<?=$row['groom_name']?>">
                    <input type="hidden" name="price" value="<?=$row['groom_price']?>">
                    <input type="hidden" name="image" value="<?=$row['groom_image']?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?=$row['groom_price']?>">
                    <button class="cart-btn" type="submit" name="buy" value="Add to Cart"> Add to Cart </button>
                    <button class="cart-btn" formaction="petGroom.php">Back</button>
                    <?php
                  } elseif ($_SESSION['usertype'] == 2){ ?>
                    <button class="cart-btn"> <a href="editPetGroom.php?groom_id=<?=$row['groom_id']?>">Edit</a></button>
                    <input type="hidden" name="groom_id" value="<?=$row['groom_id']?>">
                    <button class="cart-btn" ><a href="petGroom.php">Back</a></button>
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