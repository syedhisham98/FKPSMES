<?php
require_once '../../BusinessServiceLayer/Controller/customerController.php';
require_once '../../BusinessServiceLayer/Controller/providerController.php';
require_once '../../BusinessServiceLayer/Controller/runnerController.php';


session_start();
$customer = new customerController();
$provider = new providerController();
$runner = new runnerController();

if(isset($_POST['register'])){
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        if ($usertype == 1) {
            $customer->add();
        }
        else if ($usertype == 2) {
            $provider->add();
        }
        else if ($usertype == 3) {
            $runner->add();
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
    <title>RMS Register</title>

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
              <input type="text" placeholder="Address" name="address" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="City" name="city" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="State" name="state" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Zipcode" name="zipcode" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Username" name="username" required/>
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
                <select name="usertype" id="usertype" required>
                  <option value="">Choose User Type</option>
                  <option Value="1">Customer</option>
                  <option value="2">Service Provide</option>
                  <option value="3">Runner</option>
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
            <h3>Welcome to Runner Management System</h3>
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
  <p>All Right Reserved Marverick &#8482;</p>
  </div> 
</div>

</body>
</html>