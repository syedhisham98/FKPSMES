<?php
require_once '../../BusinessServiceLayer/Controller/scheduleController.php';

session_start();
$stdSchedule = new scheduleController();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['addschdlStd'])){
    $stdSchedule->stdAddSchdl();
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
              <h2 class="bradcaump-title">Student Add Schedule</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form method="post" action="" >
        <h2 class="title">Add New Schedule</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Title" name="title" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Content" name="content" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="time" placeholder="Time" name="time" required/>
              <input type="date" placeholder="Date" name="date" required/>
            </div>

            <div>
                <input type="submit" value="Add Schedule" name="addschdlStd" class="btn solid" />
            </div>
    </form>

<?php
include "../../includes/footer.php";
?>
</body>
</html>