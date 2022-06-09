<?php
session_start();

require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$petvet = new petvetController();
$cart = new cartController();
$data = $petvet->viewAll(); 
$view_variable = 'a string here';
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
      header('refresh:5; url=login.php');
      echo "<script type='text/javascript'>alert('$message');
      window.location = '../view';</script>";
}
 
if (isset($_POST ['delete'])) {
    $petvet->delete();
}

if(isset($_POST['buy'])){
    $cart->add();
  
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
<?php 
    if ($_SESSION['usertype'] == 3){
      include "../../includes/headerR.php";

    }else if ($_SESSION['usertype'] == 2){
      include "../../includes/headerP.php";

    }else{
      include "../../includes/header.php";
    }
    ?>



<!-- BACKGROUND -->

<!-- CONTENT -->

<h1 class="vet-title">Pet Veterinary Services</h1>
  <form>
  
  <table class="vet-page">
            <thead>
            <th>Name</th>
            <br>
            <th>Image</th>
            <th>Price</th>
            <th></th>
            </thead>
            <?php
            $i = 1;
            foreach($data as $row){
              $image =  $row['vet_image'];
              $isrc = "../../img/";

               echo "<tr class='groom-name'>"
                . "<td>".$row['vet_name']."</td>"
                . "<td><img src=\"" .$isrc. $row['vet_image'] . "\" height=\"150\" width=\"280\"></td>"
                . "<td>RM".$row['vet_price']."</td>";                         
                      
               ?>
            <td><form action="" method="POST">
            <?php
              if ($_SESSION['usertype'] == 1) {
                  ?>
              <button class="view-btn" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManagePetAssist/viewPetVet.php?vet_id=<?=$row['vet_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['vet_name']?>">
              <input type="hidden" name="price" value="<?=$row['vet_price']?>">
              <input type="hidden" name="image" value="<?=$row['vet_image']?>">
              <button class="buy-btn" type="submit" name="buy" value="BUY">Buy</button>              
              <?php
            } elseif ($_SESSION['usertype'] == 2){ ?>
              <button class="pet-btn" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManagePetAssist/viewPetVet.php?vet_id=<?=$row['vet_id']?>'">View</button>
              <br></br>
              <button class="pet-btn"input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManagePetAssist/editPetVet.php?vet_id=<?=$row['vet_id']?>'">Edit</button>
              <br></br>
              <input type="hidden" name="vet_id" value="<?=$row['vet_id']?>"><button class="del-btn"input type="submit" name="delete" value="Delete">Delete</button>
               <br></br>
              <?php
            }?>
            </td>
            <?php
              $i++;
             echo "</tr>";
            }
            ?>
        </table>
   </form>
  



<!-- FOOTER -->
<div class="footer">
  <p>All Right Reserved Marverick &#8482;</p>
</div>

</body>
</html>