<?php
require_once '../../BusinessServiceLayer/Controller/scheduleController.php';

session_start();
$lctSchedule = new scheduleController();
$data = $lctSchedule->lctViewAll();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['lctViewAll'])){
  $lctSchedule->lctViewAll();

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
              <h2 class="bradcaump-title">Lecturer Schedule</h2>
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
<tr>
    <th>No</th>
    <th></th>
    <th>Title</th>
    <th></th>
    <th>Content</th>
    <th></th>
    <th>Time</th>
    <th></th>
    <th>Date</th>
    <th></th>
    </tr>
    <?php 
    $no = 1;
    foreach($data as $row){
    echo "<tr>"?>

    <tr>
    <td><?=$no?></td>
    <td></td>
    <td><?=$row['schedule_title']?></td>
    <td></td>
    <td><?=$row['schedule_content']?></td>
    <td></td>
    <td><?=$row['schedule_time']?></td>
    <td></td>
    <td><?=$row['schedule_date']?></td>
    <td></td>
    <td>
    <form action='' method='POST'>
      <td>
      <input type="submit" name="deleteStd" value="Delete">
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
        <input type="button" onclick="window.location.href='lctAddSchedule.php';" value="Add Schedule" /> 
    </center>

<?php
include "../../includes/footer.php";
?>
</body>
</html>