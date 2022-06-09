<?php
session_start();
require_once '../../BusinessServiceLayer/Controller/paymentController.php';

$payment = new paymentController();
$data = $payment->viewPayment();


if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLogin/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['update'])) {
    $cart->updateCart();
}

if (isset($_POST ['delete'])) {
  $cart->delete();
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<body>
  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>

            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Order Status</h2>
            </div>
          
    <section class="type__category__area bg--white section-padding--lg">
      <div class="wrapper wrapper--w790">
        <div class="card card-5">
          <div class="card-heading">
            <h2 class="title">Orders</h2>
          </div>
          <div class="card-body">
            <center>
              <form action="" method="POST">
              <table>
                <thead>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Status</th>
                </thead>
                <?php
                if ($row['order_status'] = 1) {
                  $status = "Paid";
                }
                $i = 1;
                if (is_array($data) || is_object($data)){
                  foreach($data as $row){
                    $image =  $row['product_image'];
                    $isrc = "../../img/"; ?>
                    <form action="" method="POST">
                    <?php
                    echo "<tr>"
                    . "<td>".$row['product_name']."</td>"
                    . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                    . "<td>".$row['product_price']."</td>"
                    . "<td>".$row['product_quantity']."</td>"
                    . "<td>".$row['product_quantity']*$row['product_price']."</td>"
                    . "<td>".$status."</td>";    ?>                     
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
              </table>
              <br></br>
            </form>

            </center>
          </div>
        </div>
      </div>
    </section>
  </center>
</div>
</div>
</body>
</html>

