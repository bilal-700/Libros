<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "test");
if (isset($_POST["product_id"])) {
     $order_table = '';
     $message = '';
     if ($_POST["action"] == "add") {
          if (isset($_SESSION["shopping_cart"])) {
               $is_available = 0;
               foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
                         $is_available++;
                         $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
                    }
               }
               if ($is_available < 1) {
                    $item_array = array(
                         'product_id'               =>     $_POST["product_id"],
                         'product_name'               =>     $_POST["product_name"],
                         'product_price'               =>     $_POST["product_price"],
                         'product_quantity'          =>     $_POST["product_quantity"]
                    );
                    $_SESSION["shopping_cart"][] = $item_array;
               }
          } else {
               $item_array = array(
                    'product_id'               =>     $_POST["product_id"],
                    'product_name'               =>     $_POST["product_name"],
                    'product_price'               =>     $_POST["product_price"],
                    'product_quantity'          =>     $_POST["product_quantity"]
               );
               $_SESSION["shopping_cart"][] = $item_array;
          }
     }
     if ($_POST["action"] == "remove") {
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
               if ($values["product_id"] == $_POST["product_id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    $message = '<label class="error center">Product Removed</label>';
               }
          }
     }
     if ($_POST["action"] == "quantity_change") {
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
               if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
                    $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];
               }
          }
     }
     $order_table .= '  
           ' . $message . '  
           <table class="shopping-cart">
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th colspan="2">Total</th>
                                </tr>
           ';
     if (!empty($_SESSION["shopping_cart"])) {
          $total = 0;
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
               $order_table .= '  
                     <tr>
                         <td style="text-align:center;font-size:20px">' . $values["product_name"] . '</td>
                         <td style="text-align:center">
                              <input type="text" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["product_quantity"].'" class="quantity qty" data-product_id="'.$values["product_id"].'" />
                         </td>
                         <td style="text-align:center;font-size:20px">Rs '. $values["product_price"] .'</td>
                         <td style="text-align:center">Rs' . number_format($values["product_quantity"] * $values["product_price"], 2) . '</td>
                         <td> <button class="closebutton delete" name="delete" id="'. $values["product_id"] .'"><img class="img1" src="Pictures/cross.png"></button></td>
                    </tr>  
                ';
               $total = $total + ($values["product_quantity"] * $values["product_price"]);
          }
          $order_table .= '  
          <tr>
               <td align="right" colspan="5">
                    <p id="sub-total">
                         <strong>Total</strong>: Rs' .number_format($total, 2).'
                    </p>
               </td>
          </tr>

           ';
     }
     $order_table .= '</table></br></br></br>';
     $output = array(
          'order_table'     =>     $order_table,
          'cart_item'          =>     count($_SESSION["shopping_cart"])
     );
     echo json_encode($output);
}
