<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "test");
$page_name = "Cart(index)";
?>
<!DOCTYPE html>
<html>

<head>
<link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <link href='Css/style.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Londrina Solid" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galindo" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Cart</title> 
</head>


<body>
    <button onclick="topFunction()" id="myBtn">Back to Top</button>
    <div id="mySidenav" class="sidenav">
        <a href="Task1.php" id="home">Home</a>
        <a href="About.php" id="about">About</a>
    </div>
    <div id="navbar" class="div1">
        <div class="div0">
            <a href="index.php">
                <p><i class="fa fa-shopping-basket"></i> Shopping Cart</p>
            </a>
        </div>
    </div>
    <div class='login'>
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
    <center>
        <div id="myDIV" class="header">
            <h2 style="margin:15px">My To Do List</h2>
            <div style='width:100%'>
                <input style="outline:none;color:black" type="text" id="myInput" placeholder="Title...">
                <span onclick="newElement()" style='width:30%;' class="addBtn">Add</span>
            </div>
        </div>
        <ul id="myUL"></ul>
    </center>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        var mybutton = document.getElementById("myBtn");

        function scrollFunction() {
            if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.documentElement.scrollTop = 0;
        }

        var myNodelist = document.getElementsByTagName("LI");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }

        // Add a "checked" symbol when clicking on a list item
        var list = document.querySelector('ul');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName == 'LI') {
                ev.target.classList.toggle('checked');
            }
        }, false);

        // Create a new list item when clicking on the "Add" button
        function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var t = document.createTextNode(inputValue);
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                document.getElementById("myUL").appendChild(li);
            }
            document.getElementById("myInput").value = "";

            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            li.appendChild(span);

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
        }
    </script>
    <br />
    <div class="maincontainer" style="width:100%;">
        <div class="nav nav-tabs">
            <div class="li active"><a data-toggle="tab" href="#products">Product</a></div>
            <div class='li'><a data-toggle="tab" href="#cart">Cart <span class="badge"><?php if (isset($_SESSION["shopping_cart"])) {
                                                                                            echo count($_SESSION["shopping_cart"]);
                                                                                        } else {
                                                                                            echo '0';
                                                                                        } ?></span></a></div>
        </div>
        <div class="tab-content">
            <div id="products" class="tab-pane fade in active">
                <?php
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class='card'>
                        <div class='imgBx'>
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                        </div>
                        <div style='font-size:20px' class='details'>
                            <?php echo $row["name"]; ?>: <span>Rs <?php echo $row["price"]; ?></span>
                            <div style='margin-bottom:10px' class='div2'>
                                <label style='padding:3px;width:30%;margin-top:15px;margin-right:5px'>Quantity </label>
                                <input style='width:60%;margin-bottom:10px;margin-top:10px' type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control" value="1" />
                            </div>
                            <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />
                            <div class="bind">
                                <input type="button" style="width:80%" name="add_to_cart" id="<?php echo $row["id"]; ?>" class="addBtn add_to_cart" value="Add to Cart" />
                                <i style="height:40px;width:20%;color:white;font-size:large;top:10px;position:relative" class="fa fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div style="width:100%" id="cart" class="tab-pane fade">
                <div id="site">
                    <header id="masthead">
                        <h1>Libros <span class="tagline">Providing with books & stationery since 1970's</h1>
                    </header>
                    <div id="content">
                        <h1>Your Shopping Cart</h1>
                        <div id="order_table">
                            <table class="shopping-cart">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($_SESSION["shopping_cart"])) {
                                        $total = 0;
                                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                    ?>
                                            <tr>
                                                <td style='text-align:center;font-size:20px'>
                                                    <?php echo $values["product_name"]; ?>
                                                </td>
                                                <td style='text-align:center'>
                                                    <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="qty quantity" />
                                                </td>
                                                <td style='text-align:center;font-size:20px'>
                                                    Rs <?php echo $values["product_price"]; ?>
                                                </td>
                                                <td style='text-align:center'>
                                                    Rs <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?>
                                                </td>
                                                <td>
                                                    <button name="delete" class="closebutton delete" id="<?php echo $values["product_id"]; ?>">
                                                        <img class='img1' src="Pictures/cross.png">
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                            $total = $total + ($values["product_quantity"] * $values["product_price"]);
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td align="right" colspan="5">
                                                <p id="sub-total">
                                                    <strong>Total</strong>: Rs <?php echo number_format($total, 2) ?>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                        echo '<label class = "error center">Cart is Empty</label>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </br></br></br>
                        </div>
                    </div>
                </div>
                <div id="content">
                    <h1>Checkout</h1>
                    <form method="POST" action='cart.php'>
                        <div class="container">
                            <h1>Customer Details:</h1>
                            <div class="subcontainer">
                                <div class="column">
                                    <div class="inputbox">
                                        <input type="text" name="name" id="name" value="<?php echo isset($_POST['customername']) ? $_POST['customername'] : '' ?>" required>
                                        <span class="inputtext">Customer Name</span>
                                        <span class="inputline"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="subcontainer">
                                <div class="column">
                                    <div class="inputbox">
                                        <input type="text" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" required>
                                        <span class="inputtext">Customer Address</span>
                                        <span class="inputline"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="subcontainer">
                                <div class="column">
                                    <div class="inputbox">
                                        <input type="text" name="city" id="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" required>
                                        <span class="inputtext">City</span>
                                        <span class="inputline"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="subcontainer">
                                <div class="column">
                                    <div class="inputbox">
                                        <input type="text" name="zipcode" id="zipcode" value="<?php echo isset($_POST['zipcode']) ? $_POST['zipcode'] : '' ?>" required>
                                        <span class="inputtext">Zip Code</span>
                                        <span class="inputline"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="subcontainer">
                                <div class="column">
                                    <div class="inputbox">
                                        <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                                        <span class="inputtext">Email</span>
                                        <span class="inputline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="subcontainer">
                            <div class="column">
                                <input type="submit" name="place_order" class="center send" value="Place Order" />
                            </div>
                        </div></br><br/><br/><br><br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function(data) {
        $('.add_to_cart').click(function() {
            var product_id = $(this).attr("id");
            var product_name = $('#name' + product_id).val();
            var product_price = $('#price' + product_id).val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                        alert("Product has been Added into Cart");
                    }
                });
            } else {
                alert("Please Enter Number of Quantity")
            }
        });
        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr("id");
            var action = "remove";
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        action: action
                    },
                    success: function(data) {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                    }
                });
            } else {
                return false;
            }
        });
        $(document).on('keyup', '.quantity', function() {
            var product_id = $(this).data("product_id");
            var quantity = $(this).val();
            var action = "quantity_change";
            if (quantity != '') {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        action: action
                    },
                    success: function(data) {
                        $('#order_table').html(data.order_table);
                    }
                });
            }
        });
    });
</script>