<?php
require_once '../../BusinessServiceLayer/Controller/ProgressReportController.php';

session_start();
$addProgress = new ProgressReportController();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['addProgress'])){
$addProgress->addProgress();
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

    <div class="ht_bradcaump_wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Add PSM Progress</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <center>
      <form action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="student_name" placeholder="Student Name" required>
    <br><br><br>
    <input type="text" name="student_id" placeholder="Student ID" required>
    <br><br><br>
    <input type="text" name="project_title" placeholder="PSM Title" required>
    <br><br><br>
    <input type="text" name="progressDetails" placeholder="Progress Details" required>
    <br><br><br>
            <input type="submit" name="addProgress" value="Submit Progress">
          
    
        <br>
        
      </form>
  </center>



<?php
include "../../includes/footer.php";
?>
</body>
</html>