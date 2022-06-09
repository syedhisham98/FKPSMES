<?php
session_start();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include"../../includes/head.php";?>
<link rel="icon" href="../../img/RMS.png"/>
<title>FK PSM Evaluation System</title>
</head>

<style>
input {
  border-style: solid;
  border-color: grey;
}
</style>
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

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Welcome to FK PSM Evaluation System</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

<table>
<tr>
<th colspan="4"></th>
</tr>

<tr>

<th>
<form method="post">
<div class="homecard">
  <img src="../../img/food.jpg" alt="Pet hotel" width = "350" height="300">
  <div class="desc">
    <div class="hotel">
  </div>
</div>
<?php 
    if ($_SESSION['usertype'] == 1){
      ?>
      <p><button type="submit" formaction="../ManageRubric/rubricStudent.php">Rubric</button></p>
      
      <?php
    }else if ($_SESSION['usertype'] == 2){
      ?>

      <p><button type="submit" formaction="../ManageRubric/rubricLecturer.php">Rubric</button></p>

      <?php
    }else if($_SESSION['usertype'] == 3){
      ?>

      <p><button type="submit" formaction="../ManageRubric/rubricCoordinator.php">Rubric</button></p>

  <?php
    }
  ?>

</div>
</th>

<th>
<div class="homecard">
  <img src="../../img/food.jpg" alt="Pet hotel" width = "350" height="300">
  <div class="desc">
    <div class="hotel">
  </div>
</div>
<?php 
    if ($_SESSION['usertype'] == 1){
      ?>
      <p><button type="submit" formaction="../ManageProgressReport/AddNewProgress.php">Progress and Report</button></p>
      
      <?php
    }else if ($_SESSION['usertype'] == 2){
      ?>

      <p><button type="submit" formaction="../ManageFood/providerFoodList.php">Progress and Report</button></p>

      <?php
    }else if($_SESSION['usertype'] == 3){
      ?>

      <p><button type="submit" formaction="../ManageFood/foodHome.php">Progress and Report</button></p>

  <?php
    }
  ?>

</div>
</th>

<th>
<div class="homecard">
  <img src="../../img/food.jpg" alt="Pet hotel" width = "350" height="300">
  <div class="desc">
    <div class="hotel">
  </div>
</div>
<?php 
    if ($_SESSION['usertype'] == 1){
      ?>
      <p><button type="submit" formaction="../ManageSchedule/stdSchedule.php">Schedule</button></p>
      
      <?php
    }else if ($_SESSION['usertype'] == 2){
      ?>

      <p><button type="submit" formaction="../ManageSchedule/lctSchedule.php">Schedule</button></p>

      <?php
    }else if($_SESSION['usertype'] == 3){
      ?>

      <p><button type="submit" formaction="../ManageSchedule/fkSchedule.php">Schedule</button></p>

  <?php
    }
  ?>

</div>
</th>

<th>
<div class="homecard">
  <img src="../../img/food.jpg" alt="Pet hotel" width = "350" height="300">
  <div class="desc">
    <div class="hotel">
  </div>
</div>
<?php 
    if ($_SESSION['usertype'] == 1){
      ?>
      <p><button type="submit" formaction="../ManageFood/foodHome.php">Evaluation</button></p>
      
      <?php
    }else if ($_SESSION['usertype'] == 2){
      ?>

      <p><button type="submit" formaction="../ManageFood/providerFoodList.php">Evaluation</button></p>

      <?php
    }else if($_SESSION['usertype'] == 3){
      ?>

      <p><button type="submit" formaction="../ManageFood/foodHome.php">Evaluation</button></p>

  <?php
    }
  ?>

</div>
  </form>
</th>

</tr>
</table>


<?php
include "../../includes/footer.php";
?>
</body>
</html>