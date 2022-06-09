<?php
require_once '../../BusinessServiceLayer/Controller/studentController.php';
require_once '../../BusinessServiceLayer/Controller/secretariatController.php';
require_once '../../BusinessServiceLayer/Controller/lecturerController.php';


session_start();
$student = new studentController();
$secretariat = new secretariatController();
$lecturer = new lecturerController();

if(isset($_POST['register'])){
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        if ($usertype == 1) {
            $student->add();
        }
         else if ($usertype == 2) {
            $lecturer->add();
        }
         else if ($usertype == 3) {
            $secretariat->add();
        }
    }else {
        $_SESSION['message'] = "The passwords don't match";
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../asset/login.css" />
    <link rel="icon" href="../../img/RMS.png"/>
    <title>FK PSM Evaluation System Register</title>

</head>

<body>
  
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="" class="sign-in-form">
            <h2 class="title">Register New Account</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Fullname" name="name" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Phone No" name="phone" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="ID" name="ID" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="username" name="username" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="password2" required/>
            </div>

            
            <div> 
              <i class="fas fa-lock"></i>
                <select class="input-field" name="usertype" id="usertype" required>
                  <option Value="1">Student</option>
                  <option value="2">Lecturer</option>
                  <option value="3">Secretariat</option>
                </select>
            </div>
            
              
          
            
            <input type="submit" value="Register" name="register" class="btn solid" />
            </div>
          </form>
        </div>
      </div>

      <form method="post">
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Welcome to FK PSM Evaluation System</h3>
            <h3>Have an account ?</h3>
            <p>Please Sign In for the account.</p> 
            <button class="btn transparent" id="sign-up-btn" formaction="login.php" type="submit"> 
              Sign In
            </button>
          </div>
          <img src="../../img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    </form>
<!-- FOOTER -->
<div class="footer">
  <div class="foot">
  <p>All Right Reserved FKPSMES &#8482;</p>
  </div> 
</div>

</body>
</html>