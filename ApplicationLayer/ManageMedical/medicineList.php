<?php
session_start();

require_once '../../BusinessServiceLayer/Controller/medicineController.php';

$medicine = new medicineController();
$data = $medicine->viewAll(); 
$view_variable = 'a string here';

  if (isset($_POST ['delete'])) {
    $medicine->delete();
  }

  if(isset($_POST['buy'])){
    $cart->add();
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
              <h2 class="bradcaump-title">Medicine List</h2>
            </div>
          </div>
        </div>
      </div>
	</div>
  </div>
  
<section class="type__category__area bg--white section-padding">
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Medicine List</h2>
      </div>
      <div class="card-body">
  <center>
    <!-- <div class="content_resize2"> -->
      <!-- <center> -->
      <table>
            <thead>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th></th>
            <th>Action</th>
            </thead>
            <?php
            $i = 1;
            foreach($data as $row){
              $image =  $row['medicine_image'];
              $isrc = "../../img/";

               echo "<tr>"
                . "<td>".$row['medicine_name']."</td>"
                . "<td><img src=\"" .$isrc. $row['medicine_image'] . "\" height=\"130\" width=\"150\"> </td>"
                ."<td>RM".$row['medicine_price']."</td>";                         
                       // . "<td>".$row['medicine_price']."</td>";
               ?>
                 <td></td>
            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usertype'] == 1) {
                  ?>
               <button class="btn btn--radius-2 btn--black" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageMedical/view.php?medicine_id=<?=$row['medicine_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['medicine_name']?>">
              <input type="hidden" name="price" value="<?=$row['medicine_price']?>">
              <input type="hidden" name="image" value="<?=$row['medicine_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
               <br></br>
              <?php
            } elseif ($_SESSION['usertype'] == 2){ ?>
              <button class="btn btn--radius-2 btn--black" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageMedical/view.php?medicine_id=<?=$row['medicine_id']?>'">View</button>
              <br></br>
              <button class="btn btn--radius-2 btn--black" input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManageMedical/edit.php?medicine_id=<?=$row['medicine_id']?>'">Edit</button>
               <br></br>
              <input type="hidden" name="medicine_id" value="<?=$row['medicine_id']?>"><button class="btn btn--radius-2 btn--black" input type="submit" name="delete" value="Delete">Delete</button>
               <br></br>
              <?php
            }?>

                </form></td>
              <?php
              $i++;
             echo "</tr>";
            }
            ?>
        </table>
      </center>
      </div>
    </center>
</section>

<!--FOOTER-->
<div class="footer">
	<div class="foot">
	<p>All Right Reserved Marverick &#8482;</p>
	</div>
</div>



</div>

</body>
</html>

