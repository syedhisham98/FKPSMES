<?php
require_once '../../BusinessServiceLayer/Controller/rubricController.php';

session_start();

$rubric = new rubricController();
$data = $rubric->viewRubric();

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageUser/login.php';</script>";
}

if(isset($_POST['viewRubric'])){
    $rubric->viewRubric();
  
}

if(isset($_POST['deleteRubric'])){
  $rubric->deleteRubric();
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

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">PSM Rubric</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

<center>
<table>
<tr>
<th colspan="4"></th>
</tr>

<tr>
<th>
<form method="post">
<div class="">
    <p><button type="submit" formaction="../ManageRubric/addRubric.php">Add Rubric</button></p>
</div>
</th>


<tbody>
<table>
  <tr>
    <th>Description</th>
    <th>Mark</th>
    <th>Weight</th>
  </tr>
</table>

<table>
    <?php 
    $no = 1;
    foreach($data as $row){
    echo "<tr>"?>
    <td align="center"><?=$row['rubricDesc']?></td>
    <td align="center"><?=$row['rubricWeight']?></td>
    <td align="center"><?=$row['rubricMark']?></td>
    </td>

    <td>
      <input type="button" onclick="window.location.href='editRubric.php';" value="Edit"/>
      <form action='' method='POST'>
      <input type="hidden" name="rubricID" value="<?=$row['rubricID']?>">
      <input type="submit" name="delete" value="Delete">
      </form>
    </td>

    </td>
    
    <?php
    "</tr>";
    $no++;
  }
  ?>
  </table>
  </tbody>

</div>
</th>


</tr>
</table>
  </center>

<?php
include "../../includes/footer.php";
?>
</body>
</html>