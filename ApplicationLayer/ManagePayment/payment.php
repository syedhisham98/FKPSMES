<?php
session_start();
require_once '../../BusinessServiceLayer/Controller/customerController.php';
require_once '../../BusinessServiceLayer/Controller/cartController.php';
require_once '../../BusinessServiceLayer/Controller/paymentController.php';
$cart = new cartController();
$customer = new customerController();
$payment = new paymentController();
$data = $cart->viewCart();
$cust_data = $customer->viewCustomer();
$total_quantity = 0;
$total_price = 0;


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
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

</head>

<body>
  <script src="https://www.paypal.com/sdk/js?client-id=AUBIN6bECGxdViV45De8qSTNM6QL2LVlNbqjdWaYYRwoMUsEatNvcwrL1C7YmBUAQ49h8GJhXKCXO-_j&currency=MYR">
  </script>
 
        <?php 
        include "../../includes/header.php";
        ?>

      <div class="addtittle">
        <h1>Cart</h1>
      </div>
              <div class="card-body">
                <center>
                  <form action="" method="post">
                    <table>
                      <thead>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
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
                            . "<td><input type=\"number\" name=\"quantity\" value=\"".$row['product_quantity']."\"> </td>"
                            . "<td>".$price."</td>";    ?>                     
                            <td><button class="btn btn--radius-2 btn--red" type="submit" name="update" value="Update">Update</button>
                              <br></br>
                              <input type="hidden" name="cart_id" value="<?=$row['cart_id']?>"><button class="btn btn--radius-2 btn--red" type="submit" name="delete" value="Delete">Delete</button>
                              <br></br>
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
                    <?php
                    foreach ($cust_data as $row2) {
                      $name = $row2['customer_name'];
                      $email = $row2['customer_email'];
                      $phone = $row2['customer_phone'];
                      $address = $row2['customer_address'];
                      $city = $row2['customer_city'];
                      $state = $row2['customer_state'];
                      $zipcode = $row2['customer_zipcode'];
                    } ?>

                    <div id="paypal-button-container"></div>
                    <script>
                      paypal.Buttons({
                        createOrder: function(data, actions) {
                  return actions.order.create({
                    payer: {
                      email_address: '<?= $email ?>',
                      name: {
                        given_name: '<?= $name ?>'
                      },
                      address: {
                        address_line: '<?= $address ?>',
                        admin_area_1: '<?= $state ?>',
                        admin_area_2: '<?= $city ?>',
                        postal_code: '<?= $zipcode ?>',
                        country_code: "MY"
                      }
                    },
                    purchase_units: [{
                      amount: {
                        currency_code: 'MYR',
                        value: '<?= $total_price ?>'
                      }
                    }]
                  });
                },
                onError: function(error) {
                  console.log(error);                      
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                  alert('Transaction completed by ' + details.payer.name.given_name);
                  window.location.href = "../../ApplicationLayer/ManagePayment/successfulPay.php?customer_id=<?=$_SESSION['userid']?>"                  
                });
              }
            }).render('#paypal-button-container');
          </script>

        </form>

      </center>
    </div>
  </div>
</div>
</center>
</div>
</div>
  <?php

  include "../../includes/footer.php";
  ?>
</div>

</body>
</html>

