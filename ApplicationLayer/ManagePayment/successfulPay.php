<?php
session_start();
require_once '../../BusinessServiceLayer/Controller/customerController.php';
require_once '../../BusinessServiceLayer/Controller/cartController.php';
require_once '../../BusinessServiceLayer/Controller/paymentController.php';
require_once '../../BusinessServiceLayer/Controller/trackingController.php';
date_default_timezone_set('Asia/Kuala_Lumpur');

$cart = new cartController();
$customer = new customerController();
$payment = new paymentController();
$tracking = new trackingController();
$data = $cart->viewCart();
$cust_data = $customer->viewCustomer();
$custFullAddress = $customer->viewCustomerFullAddress();
$total_quantity = 0;
$total_price = 0;


if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLogin/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['go'])) {
		$payment->addOrder();
    $tracking->add();
		$cart->deleteAll();

}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
<?php 
        include "../../includes/header.php";
        ?>

          <div class="card-success">
            <h2 class="title">Thanks for Your Purchase!</h2>
          </div>
          <div class="card-body">
          <center>
          <?php
                    $i = 1;
                    foreach ($cust_data as $row2) {
                      $name = $row2['customer_name'];
                      $email = $row2['customer_email'];
                      $phone = $row2['customer_phone'];
                      $address = $row2['customer_address'];
                    } ?>
                      
                    <form action="" method="POST">
                    <?php
                    echo "<tr>"
                    ."<br><b>Date:</b>". "<td>". date("Y-m-d") . "</td>"
                    ."<br><b>Name:</b>". "<td>".$row2['customer_name']."</td>"
                    ."<br><b>Email:</b>". "<td>".$row2['customer_email'] . "</td>"
                    ."<br><b>Address:</b>". "<td>".$custFullAddress . "</td>"
                    ."<br><b>Phone Number:</b>"."<td>".$row2['customer_phone']."</td>"
                    ?>                     
                    </td>
                    <?php
                    $i++;
                    echo "</tr>";
                    ?>
                    </form>
                    <?php
                ?>   
          </center>
            <br><br> 
            <center>
              <form action="" method="POST">
              <table>
                <thead>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </thead>
                <?php
                $i = 1;
                if (is_array($data) || is_object($data)){
                  foreach($data as $row){
                    $quantity = $row["product_quantity"];
                    $price = $row["product_price"] * $quantity;
                    $total_quantity += $quantity;
                    $total_price += $price;
                    $image =  $row['product_image'];
                    $isrc = "../../img/"; ?>
                    <form action="" method="POST">
                    <?php
                    echo "<tr>"
                    . "<td>".$row['product_name']."</td>"
                    . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                    . "<td>".$row['product_price']."</td>"
                    . "<td>".$row['product_quantity']."</td>"
                    . "<td>".$row['product_quantity'] * $row['product_price']."</td>";    ?>                     
                    </td>
                    <?php
                    $i++;
                    echo "</tr>";
                    ?>
                    </form>
                    <?php
                  }
                }                
                ?>
                <tr>
                  <td><b>Total:</b></td>
                  <td></td>
                  <td></td>
                  <td><b><?=$total_quantity; ?></b></td>
                  <td><b>RM<?=$total_price; ?></b></td>
                  <td></td>
                </tr>
              </table>
              <br></br>
              <input type="hidden" name="customerFullAddress" value="<?=$custFullAddress?>">
              <button class="btn btn--radius-2 btn--green" type="submit" name="go" value="Go">Order Status</button>
            </form>
            </center>
          </div>
        </div>
      </div>
    
  </center>

</div>
</body>
</html>