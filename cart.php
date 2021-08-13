<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "test");
$page_name = "Order Confirmation(Final Page)";
?>
<!DOCTYPE html>
<html>

<head>
     <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Galindo" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Londrina Solid" rel="stylesheet">
     <link rel="stylesheet" href="Css/style.css">
</head>

<body>
     <title>Order</title>
     <div style='display:none'>
          <?php
          if ($_SESSION["username"]) {
          ?>
               Logged In. Click to <a href="logout.php" tite="Logout">Logout.</a>
          <?php
          } else {
               header("Location:Login.php");
          };
          ?>
          <?php
          include "webcounter.php";
          $access_number = visitor($page_name);
          ?>
     </div>
     <div class="container" style="width:100%;">
          <?php
          if (isset($_POST["place_order"])) {
               $name = $_POST['name'];
               $address = $_POST['address'];
               $zip = $_POST['zipcode'];
               $city = $_POST['city'];
               $email = $_POST['email'];

               $insert_customerinfo = "INSERT INTO tbl_customer(customer_email, customer_name, customer_address, customer_city, customer_postalcode) 
               VALUES('$email','$name','$address','$city','$zip')";
               $customer_id = "";
               if (mysqli_query($connect, $insert_customerinfo)) {
                    $customer_id = mysqli_insert_id($connect);
               }
               $insert_order = "  
                     INSERT INTO tbl_order(customer_id, creation_date, order_status)  
                     VALUES($customer_id, '" . date('Y-m-d') . "', 'pending')  
                     ";
               $order_id = "";
               if (mysqli_query($connect, $insert_order)) {
                    $order_id = mysqli_insert_id($connect);
               }
               $_SESSION["order_id"] = $order_id;
               $order_details = "";
               foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    $order_details .= "  
                          INSERT INTO tbl_order_details(order_id, product_name, product_price, product_quantity)  
                          VALUES('" . $order_id . "', '" . $values["product_name"] . "', '" . $values["product_price"] . "', '" . $values["product_quantity"] . "');  
                          ";
               }
               if (mysqli_multi_query($connect, $order_details)) {
                    unset($_SESSION["shopping_cart"]);
                    echo '<script>alert("You have successfully place an order...Thank you")</script>';
                    echo '<script>window.location.href="cart.php"</script>';
               }
          }
          if (isset($_SESSION["order_id"])) {
               $customer_details = '';
               $order_details = '';
               $total = 0;
               $query = '  
               SELECT * FROM tbl_order  
                     INNER JOIN tbl_order_details  
                     ON tbl_order_details.order_id = tbl_order.order_id  
                     INNER JOIN tbl_customer  
                     ON tbl_customer.customer_id = tbl_order.customer_id  
                     WHERE tbl_order.order_id = "' . $_SESSION["order_id"] . '"  
                     ';
               $result = mysqli_query($connect, $query);
               while ($row = mysqli_fetch_array($result)) {
                    $customer_details = "
                              <tr>  
                                   <td style = 'text-align:left'>Name : " . $row["customer_name"] . "</td>
                              </tr>
                              <tr>   
                                    <td style = 'text-align:left'>Address : " . $row["customer_address"] . "</td>
                              </tr>
                              <tr>        
                                    <td style = 'text-align:left'>City : " . $row["customer_city"] . ", " . $row["customer_postalcode"] . "</td>
                              </tr>
                              <tr>      
                                    <td style = 'text-align:left'>Email : " . $row["customer_email"] . "</td>  
                               </tr>    
                          ";
                    $order_details .= "  
                               <tr>  
                                    <td>" . $row["product_name"] . "</td>  
                                    <td>" . $row["product_quantity"] . "</td>  
                                    <td>" . $row["product_price"] . "</td>  
                                    <td>" . number_format($row["product_quantity"] * $row["product_price"], 2) . "</td>  
                               </tr>  
                          ";
                    $total = $total + ($row["product_quantity"] * $row["product_price"]);
               }
               echo '
                    <div id="site">
                    <header id="masthead">
                         <h1>Libros <span class="tagline">Providing with books & stationery since 1970"s</h1>
                    </header>
                    <h3 style = "font-weight:bold;color:#00bff3" align= "center">Order Summary for Order no. ' . $_SESSION["order_id"] . '</h3>  
                    <table class="shopping-cart">
                         <tr>  
                              <td><label>Customer Details</label></td>  
                         </tr>
                              <table class="shopping-cart"> 
                                   ' . $customer_details . ' 
                              </table>
                              <table class="shopping-cart">
                                   <tr>
                                        <td><label>Order Details</label></td> 
                                   </tr>
                                        <table class="shopping-cart">
                                             <tr>  
                                                  <th width="40%">Product Name</th>  
                                                  <th width="25%">Quantity</th>  
                                                  <th width="15%">Price</th>  
                                                  <th width="20%">Total</th>  
                                             </tr>
                                             <tr>
                                             ' . $order_details . '  
                                             </tr>
                                             <tr>  
                                                  <td colspan="4" align="right">Total : Rs ' . number_format($total, 2) . '</td>  
                                             </tr>     
                                        </table>
                              </table>               
                    </table>  
                     </div>
                    <a href = "index.php"><button style = "background:none" id = "send">Back to Shop more</button></a>  
                     ';
          }
          ?>
     </div>
</body>

</html>