<?php
require_once '../../BusinessServiceLayer/Controller/ProgressReportController.php';

session_start();
$stdProgress = new progressController();
$data = $stdProgress->stdViewProgress();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['stdViewProgress'])){
  $stdProgress->stdViewProgress();

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
              <h2 class="bradcaump-title">Student Schedule</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <center>
      <tbody>

        <table>
            <?php 
            $no = 1;
            foreach($data as $row){
            echo "<tr>"?>
            <tr>
            <th>No</th>
            <th></th>
            <th>Student Name</th>
            <th></th>
            <th>Student ID</th>
            <th></th>
            <th>PSM Title</th>
            <th></th>
            <th>Progress</th>
            <th></th>
            </tr>
            <tr>
            <td><?=$no?></td>
            <td></td>
            <td><?=$row['student_name']?></td>
            <td></td>
            <td><?=$row['student_id']?></td>
            <td></td>
            <td><?=$row['project_title']?></td>
            <td></td>
            <td><?=$row['progressDetails']?></td>
            <td></td>
            <td>
            <form action='' method='POST'>
              <td>
              <input type="submit" name="update" value="Update" href>    
            </td>
            </form>    
            </td>
            </tr>
            
            </form>

            </td>
            
            <?php
            "</tr>";
            $no++;
          }
          ?>
        </table>
    </tbody>
    <br>
      <input type="button" onclick="window.location.href='AddNewProgress.php';" value="Add New Progress" /> 
    </center>


<?php
include "../../includes/footer.php";
?>
</body>
</html>