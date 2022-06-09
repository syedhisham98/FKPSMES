<?php
require_once '../../BusinessServiceLayer/Controller/ProgressReportController.php';

session_start();
$stdProgress = new progressController();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['stdAddProgress'])){
  $stdProgress->stdAddProgress();
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
              <h2 class="bradcaump-title">Student Add Progress</h2>
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
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Student ID</td>
                    <td><input type="text" name="stdID" required></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" required></td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td><input type="text" name="detail" required></td>
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
                    <td><input style="float: left;" type="button" onclick="window.location.href='ManageUser/home.php';" value="Back" /></td>
                    <td><input type="submit" name="stdAddProgress" value="Add Progress"></td>
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