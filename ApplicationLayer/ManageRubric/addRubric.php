<?php
require_once '../../BusinessServiceLayer/Controller/rubricController.php';

session_start();

$rubric = new rubricController();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['addRubric'])){
    $rubric->addRubric();
    
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
              <h2 class="bradcaump-title">Rubric</h2>
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
      <td>Description</td>
      <td><input type="text" name="rubricDesc" required></td>
    </tr>
    <tr>
      <td>Mark</td>
      <td><input type="number" name="mark" required></td>
    </tr>
    <tr>
      <td>Weight</td>
      <td><input type="number" name="weight" required></td>
    </tr>
  </table>
  <br>
  <input type="submit" name="addRubric" value="Add Rubric">
  <input type="button" onclick="window.location.href='rubricCoordinator.php';" value="Back" />
</form>
  </center>

<?php
include "../../includes/footer.php";
?>
</body>
</html>