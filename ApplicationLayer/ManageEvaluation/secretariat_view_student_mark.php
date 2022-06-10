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
              <h2>Student Evaluation Marks</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div>
        <div class="position">

        
            <table width = "400" border =" 0" cellspacing = "1" cellpadding = "2" class="evaluation">
                <tr>
                    <th width = "100">Student Name</th>
                    <th>ID</th>
                    <th>Supervisor</th>
                    <th>First Evaluation-Supervisor(20%)</th>
                    <th>Second Evaluation-Supervisor(20%)</th>
                    <th>Evaluator Evaluation(40%)</th>
                    <th>Total Marks</th>

                    <?php
                    $sname = "localhost";
                    $uname = "root";
                    $password = "";
                    $db_name = "fkpsmes";

                    $conn = mysqli_connect($sname, $uname, $password, $db_name);
                    if (!$conn) {
                        echo "Connection Failed!";
                        exit();
                    }
                    

                    $result = mysqli_query($conn, "SELECT * FROM evaluation");

                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['studentid'] . "</td>";
                    echo "<td>" . $row['studentname'] . "</td>";
                    echo "<td>" . $row['advisorname'] . "</td>";
                    echo "<td>" . $row['evaluation1'] . "</td>";
                    echo "<td>" . $row['evaluation2'] . "</td>";
                    echo "<td>" . $row['evaluation3'] . "</td>";
                    echo "<td>" . $row['totalmarks'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";

                
                    ?>

                    <form method="post">
                        <div>
                            <label>Student ID</label>
                            <input type="text" name="studentid" class="form-control">
                        </div>
                        <div>
                            <label>Name</label>
                            <input type="text" name="studentname" class="form-control">
                        </div>
                        <div>
                            <label>Supervisor</label>
                            <input type="text" name="advisorname" class="form-control">
                        </div>
                        <div>
                            <label>Evaluation 1</label>
                            <input type="text" name="evaluation1" class="form-control">
                        </div>
                        <div>
                            <label>Evaluation 2</label>
                            <input type="text" name="evaluation2" class="form-control">
                        </div>

                        <div>
                            <label>Evaluator Evaluation </label>
                            <input type="text" name="evaluation3" class="form-control">
                        </div>
                        <div>
                            <label>Total Marks</label>
                            <input type="text" name="totalmarks" class="form-control">
                        </div>
                        <button type="submit" name="save" value="submit">Submit Evaluation mark</button>
                    </form>
                    </div>

                    <?php
                        if(isset($_POST['save']))
                        {    
                            $studentid = $_POST['studentid'];
                            $studentname = $_POST['studentname'];
                            $advisorname = $_POST['advisorname'];
                            $evaluation1 = $_POST['evaluation1'];
                            $evaluation2 = $_POST['evaluation2'];
                            $evaluation3 = $_POST['evaluation3'];
                            $totalmarks = $_POST['totalmarks'];


                            $sql = "INSERT INTO evaluation (studentid,studentname,advisorname,evaluation1,evaluation2,evaluation3,totalmarks) VALUES ('$studentid','$studentname','$advisorname','$evaluation1','$evaluation2','$evaluation3','$totalmarks')";
                            if (mysqli_query($conn, $sql)) {
                                echo "Data inserted !";
                            } else {
                                echo "Error: " . $sql . ":-" . mysqli_error($conn);
                            }
                            mysqli_close($conn);
                        }
                        
                    ?>
                </tr>
        </div>
    </div>

</body>
</html>