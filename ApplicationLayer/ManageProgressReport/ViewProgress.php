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

<!DOCTYPE html>
<html>
    <head>
        <title>Add New Progress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>
            body {
                background-color: #FFFFFF;   
            }
            
            p {
                font-size: 20px;
                text-align: center;
            } 
            
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            
            .container {
                border-radius: 5px;
                padding: 20px;
                width: 50%;
            }
            
            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            
            input[type=text], input[type=password],input[type=email] {
                width: 100%;
                padding: 10px 18px;
                margin: 5px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            
            .update, .delete {
                background-color: rgb(160, 160, 160);
                color: white;
                padding: 10px 10px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 30%;
                opacity: 0.9;
            }

            .update:hover, .delete :hover {
                opacity: 1;
            }
            
            .showPwd {
                font-size: medium;
                padding-top: 5px;
                text-align: right;
            }
            
            @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }
            
        </style>
    </head>
    <script>
        function showPassword() {
            var x = document.getElementById("password");
    
            if(x.type === "password"){
                x.type = "text";
            } 
            else{
                x.type = "password";
            }
        }
    </script>
    <body>
        <br>
        <p><strong>Add New PSM Progress</strong></p>
        <br>
            <form action="" method="POST">
             
                <center><div class="container">

                        <input type="text" name="cust_name" value="<?=$row['cust_name']?>" placeholder="Name" required>
                    <br>
                        <input type="text" name="cust_phonumber" value="<?=$row['cust_phonumber']?>" placeholder="Phone Number" required>
                    <br>
                        <input type="text" name="cust_accountnumber" value="<?=$row['cust_accountnumber']?>" placeholder="Account Number" required>
                    <br>
                        <input type="text" name="cust_bankName" value="<?=$row['cust_bankName']?>" placeholder="Bank Name" required>
                
                
                    <div class="container"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                        <br>
                            <button type="submit" onclick="updateProfile()" class="update" name="update">Update Profile</button>
                            <button type="submit" onclick="deleteProfile()" class="delete" name="delete">Delete Profile</button>&emsp;
                    </div>
                </center> 
                
            </form>
    </body>
</html>

<script>
    function updateProfile() {
        confirm("Press okay if confirm to update profile!");
        
    }
        function deleteProfile() {
        confirm("Press okay if confirm to delete account!");
    }
</script>