<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
session_start();

$vet_id = $_GET['vet_id'];
$petvet = new petvetController();
$cart = new cartController();
$data = $petvet->viewpetvet($vet_id); 
$name = $_GET['vet_id'];

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
</div>

<!-- CONTENT -->   
<form method="post">
<main class="product-container">

<?php foreach($data as $row){ ?> 
    <div class="left-column">       
        <img src="../../img/<?php echo $row['vet_image'];?>">   
    </div>

    <div class="right-column">

        <div class="product-description">
            <span>Pet Veterinary</span>
            <h1><?=$row['vet_name']?></h1>
            <p><?=$row['vet_details']?></p>    
        </div>

        <div class="product-price">
            <span>RM <?=$row['vet_price']?></span>
        </div>
        <br>
        <?php
                  if ($_SESSION['usertype'] == 1) {
                    ?>
                    <input type="hidden" name="name" value="<?=$row['vet_name']?>">
                    <input type="hidden" name="price" value="<?=$row['vet_price']?>">
                    <input type="hidden" name="image" value="<?=$row['vet_image']?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?=$row['vet_price']?>">
                    <button class="cart-btn" type="submit" name="buy" value="Add to Cart"> Add to Cart </button>
                    <button class="cart-btn" formaction="petVet.php">Back</button>
                    <?php
                  } elseif ($_SESSION['usertype'] == 2){ ?>
                    <button class="cart-btn"> <a href="editPetVet.php?vet_id=<?=$row['vet_id']?>">Edit</a></button>
                    <input type="hidden" name="vet_id" value="<?=$row['vet_id']?>">
                    <button class="cart-btn" ><a href="petVet.php">Back</a></button>
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