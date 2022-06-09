<?php
require_once '../../BusinessServiceLayer/Controller/medicineController.php';
session_start();
$medicine_id = $_GET['medicine_id'];
$medicine = new medicineController();
$data = $medicine->viewMedicine($medicine_id);

if(isset($_POST['update'])){
  $medicine->editMedicine();
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
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<section class="type__category__area bg--white section-padding">
  <div class="wrapper wrapper--w790"> 
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Edit Medicine</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
		  }?>
            <center><img src="../../img/<?php echo $row['medicine_image'];?>" height="130" width="150"></center>            
            <div class='form-row'>
              <div class='name'>ID: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="medicine_id" value="<?=$row['medicine_id']?>" readonly>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="name" value="<?=$row['medicine_name']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="details" value="<?=$row['medicine_details']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="price" value="<?=$row['medicine_price']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="quantity" value="<?=$row['medicine_quantity']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Image: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="file" name="image" value="<?=$row['medicine_image']?>" >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--black" type="submit" name="update" value="UPDATE"> Update</button>
              <button class="btn btn--radius-2 btn--black"> <a href="medicineList.php">Back</a></button>
          </center>
        </div>
      </form>
    </center>
  </section>
  
<!--FOOTER-->
<div class="footer">
	<div class="foot">
	<p>All Right Reserved Marverick &#8482;</p>
	</div>
</div>

</body>
</html>