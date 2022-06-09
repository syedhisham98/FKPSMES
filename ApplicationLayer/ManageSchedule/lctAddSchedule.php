<?php
require_once '../../BusinessServiceLayer/Controller/scheduleController.php';

session_start();
$lctSchedule = new scheduleController();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['lctAddSchedule'])){
  $lctSchedule->lctAddSchedule();
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
              <h2 class="bradcaump-title">Lecturer Add Schedule</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <center>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" required></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><input type="text" name="content" required></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><input type="time" name="time" required></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" required></td>
                </tr>
                <tr>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><input style="float: left;" type="button" onclick="window.location.href='lctSchedule.php';" value="Back" /></td>
                    <td><input type="submit" name="lctAddSchedule" value="Add Schedule"></td>
                </tr>
            </table>
        <br>
        
      </form>
</center>

<?php
include "../../includes/footer.php";
?>
</body>
</html>