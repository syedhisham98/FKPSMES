<!DOCTYPE html>	
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <h1><b>Project List</b></h1>
<center>
    <form name ="goodsform" action="" method="post"> 
      <table style="border: 3px solid maroon;margin:10px;padding:50px; width:60%;">
      <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Proposal</th>
        </tr>
        
    <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        if($i%2==0)
             $classname="evenRow";
        else
             $classname="oddRow";
    ?>
         <tr class="<?php if(isset($classname)) echo $classname;?>">
          <td><input type="checkbox" name="approval[]" value="<?php echo $row["Stud_id"]; ?>" ><?php echo $row["Stud_id"];?></td>
          <td><?php echo $row["Stud_id"]?></td>
		  <td><?php echo $row["Stud_name"]?></td>
		  <td><?php echo $row["proposal"]?></td>
        </tr>
    <?php
        $i++;
        }
    ?>
          <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
		  <script type="text/javascript" src="approvereject.js"></script>
          <td><input type="submit" name="approve" value="Approve" onClick="approveTitle();"></td>
          <td><input type="submit" name="reject" value="Reject"  onClick="rejectTitle();"></td>
          </tr>
          
          
        </table>
        </form> 
 
		
      </div>
	</center>
  </body>
</html>
