<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <link href='Css/Adminpage.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Balsamiq Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script src="js/jquery-1.11.0.js"></script>
</head>
<title>Admin Page</title>
</head>

<body>
    <div class='login'>
        <?php
        if ($_SESSION["username"] == 'abc.18@gmail.com') {
        ?>
            Logged In. Click to <a href="logout.php" tite="Logout">Logout.</a>
        <?php
        } else {
            header("Location:Login.php");
        };
        ?>
    </div>

    <div class="maincontainer">
        <div class="nav nav-tabs">
            <div class="li active"><a data-toggle="tab" href="#addproduct">Add Product</a></div>
            <div class='li'><a data-toggle="tab" href="#deleteaproduct">Delete Product</a></div>
            <div class='li'><a data-toggle="tab" href="#updateaproduct">Update Product</a></div>
            <div class='li'><a data-toggle="tab" href="#deleteanorder">Delete order</a></div>
            <div class='li'><a data-toggle="tab" href="#customerdata">Customer Data</a></div>
            <div class='li'><a data-toggle="tab" href="#pagevisited">Visited Data</a></div>
        </div>
        <div class="tab-content">
            <div id="addproduct" class="tab-pane fade in active">
                <form method="POST" action='Addproduct.php'>
                    <div class="container" style='margin-top:50px;'>
                        <center>
                            <h1>Add a Product</h1>
                        </center>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productname" value="<?php echo isset($_POST['productname']) ? $_POST['productname'] : '' ?>" required>
                                    <span class="inputtext">Product Name</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productprice" value="<?php echo isset($_POST['productprice']) ? $_POST['productprice'] : '' ?>" required>
                                    <span class="inputtext">Product Price</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productlocation" value="<?php echo isset($_POST['productlocation']) ? $_POST['productlocation'] : '' ?>" required>
                                    <span class="inputtext">Product Location</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <input type="submit" name='submit' value='Add' class='center' id="send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="deleteaproduct" class="tab-pane fade">
                <form method="POST" action='Addproduct.php'>
                    <div class="container">
                        <center>
                            <h1>Delete a Product</h1>
                        </center>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productname" value="<?php echo isset($_POST['productname']) ? $_POST['productname'] : '' ?>" required>
                                    <span class="inputtext">Product Name</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productid" value="<?php echo isset($_POST['productprice']) ? $_POST['productprice'] : '' ?>" required>
                                    <span class="inputtext">Product Id</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <input type="submit" name='delete' class='center' value='Delete' id="send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="updateaproduct" class="tab-pane fade">
                <form id="updateaproduct" method="POST" action='Addproduct.php'>
                    <div class="container">
                        <center>
                            <h1>Update a Product</h1>
                        </center>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productid" value="<?php echo isset($_POST['productprice']) ? $_POST['productprice'] : '' ?>" required>
                                    <span class="inputtext">Product Id</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productname" value="<?php echo isset($_POST['productname']) ? $_POST['productname'] : '' ?>" required>
                                    <span class="inputtext">Product Name</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productprice" value="<?php echo isset($_POST['productprice']) ? $_POST['productprice'] : '' ?>" required>
                                    <span class="inputtext">Product Price</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="productlocation" value="<?php echo isset($_POST['productlocation']) ? $_POST['productlocation'] : '' ?>" required>
                                    <span class="inputtext">Product Location</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <input type="submit" class='center' name='Update' value='Update' id="send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="deleteanorder" class="tab-pane fade">
                <form id="deleteanorder" method="POST" action='Addproduct.php'>
                    <div class="container">
                        <center>
                            <h1>Delete an Order</h1>
                        </center>
                        <div class="subcontainer">
                            <div class="column">
                                <div class="inputbox">
                                    <input type="text" name="order_id" value="<?php echo isset($_POST['order_id']) ? $_POST['order_id'] : '' ?>" required>
                                    <span class="inputtext">Order Id</span>
                                    <span class="inputline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <input type="submit" name='deleteorder' class='center' value='Delete' id="send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="customerdata" class="tab-pane fade">
                <div id="content">
                    <h1>Customers' Data</h1>
                </div>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "test");
                $result = mysqli_query($connect, 'SELECT * FROM tbl_order  
                    INNER JOIN tbl_order_details  
                    ON tbl_order_details.order_id = tbl_order.order_id  
                    INNER JOIN tbl_customer  
                    ON tbl_customer.customer_id = tbl_order.customer_id  
                    WHERE tbl_order.order_id = tbl_order.customer_id ');

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<table class = 'center'>";
                    echo "<tr><th>Customer Information</th><th>Order Information</th></tr>";
                    $id = $row['order_id'];
                    echo "<tr>";
                    echo "<td style = 'text-align:left;'>Name : " . $row['customer_name'] . "</td><td style = 'text-align:left;'>Order id : " . $row['order_id'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style = 'text-align:left'>Email : " . $row['customer_email'] . "</td><td style = 'text-align:left;'>Status : " . $row['order_status'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style = 'text-align:left'>City : " . $row['customer_city'] . ", " . $row['customer_postalcode'] . "</td><td style = 'text-align:left;'>Order Date : " . $row['creation_date'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style = 'text-align:left'>Address : " . $row['customer_address'] . "</td><td style = 'text-align:left;'>Customer id : " . $row['customer_id'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<table class = 'center'>";
                    echo "<tr><th style = 'text-align:center'>Order Details</th></tr>";
                    echo "<tr>";
                    echo "<td >Name : " . $row['product_name'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Price : " . $row['product_price'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Quantity : " . $row['product_quantity'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<form method = 'POST' action = 'Addproduct.php?order_id=" . $row['order_id'] . "'>";
                    echo "<input type = 'submit' class = 'button1 center' name = 'updatestatus' value = 'Done''>";
                    echo "</form>";
                }
                ?>
            </div>
            <div id="pagevisited" class="tab-pane fade">
                <div id="content">
                    <h1>Page visited Data</h1>
                </div>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "webcounter");
                $result = mysqli_query($connect, 'SELECT * FROM webcounter');

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<table class = 'center'>";
                    echo "<tr>";
                    echo '<td style = "text-align:left">Page Name : ' . $row["access_page"] . '</td>';
                    echo '<td style = "text-align:right">Visited : ' . $row["access_counter"] .  ' times</td>';
                    echo "</tr>";
                    echo "</table><br/>";
                }
                ?>
            </div>
        <div>
    </div>
</body>

</html>