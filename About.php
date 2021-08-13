<?php
session_start();
$page_name = "About";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Londrina Solid" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="Css/about.css" rel="stylesheet">
    <script src="Css/js/jquery-1.11.0.js"></script>
    <title>About</title>
    <style>
        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="navbar" style='height:83px;top:0' class="div1">
        <input type="checkbox" id="check">
        <label for="check" id="hamburger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </label>
        <ul class='ul'>
            <li class='li'>
                <a href="Task1.php" rel="Home page">Home</a>
            <li>
                <a href="About.php" rel="About">About</a>
            </li class='li'>
            <li class='li'>
                <a href="index.php" rel="Products">Products</a>
            </li>
            <li class='li'>
                <a href="Login.php" rel="Log In">Login</a>
            </li>
            <li class='li'>
                <a href="#footer" rel="Contact">Contact</a>
            </li>
        </ul>
    </div>

    <div id="navbar1" style='top: 83px;' class='login'>
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

    <script>
        var navbar = document.getElementById("navbar");
        var navbar1 = document.getElementById("navbar1");
        var sticky = navbar.offsetTop;

        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;

            myFunction(), scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                navbar.style.display = "block";
                navbar1.style.display = "block";
            } else {
                navbar.style.display = "none";
                navbar1.style.display = "none";
            }
        }

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }

        }
    </script>
    <div class="svg-container">
        <svg viewbox="0 0 800 400" class="svg">
            <path id="curve" fill="#00bff3" d="M 800 300 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
            </path>
        </svg>
    </div>
    <header style='margin-top:-50%;margin-bottom:10%'>
        <div class="main">
            <center>Libros</center>
        </div>
        <span style='font-size:25px; color:#fff' class='sb1'>It's not just about having stuff. It's about</span>
        <div class="wordCarousel">
            <div class='center'>
                <ul class="flip4" style='background:none'>
                    <li>Prestige</li>
                    <li>Purity</li>
                    <li>Morality</li>
                    <li>Quality</li>
                </ul>
            </div>
        </div>
    </header>


    <section class="wrapper1">
        <ul class="tabs">
            <li class="active">About</li>
            <li>Google Map Location</li>
        </ul>

        <ul class="tab__content">
            <li class="active">
                <div class="content__wrapper">
                    <div class='screen'>
                        <div class='card'>
                            <div class='front-box'>
                                <h1>About Libros</h1>
                                <p>Best Stationery & Books selling Brand</p>
                            </div>
                            <div class='details-1'>
                                <p>Believes in quality</p>
                            </div>
                            <div class='details-2'>
                                <p>Since 1970's</p>
                            </div>
                        </div>
                        <div class='card'>
                            <div class='front-box'>
                                <h1>Brand Owner</h1>
                                <p>of Libros</p>
                            </div>
                            <div class='details-1'>
                                <p>Muhammad Bilal</p>
                            </div>
                            <div class='details-2'>
                                <p>I believe in quality that I don't compromise.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style='background-color: #09728f;'>
                <center><iframe src="https://www.google.com/maps/embed?pb=" width="500" height="400" frameborder="0" style='margin-top:2%' allowfullscreen=""></iframe></center>
            </li>
        </ul>
    </section>

    <div class='footer'>
        <div style='list-style-type:none' class='ul3'>
            <div class='li3'><a class='a1' href="mailto:">Email (XXX@gmail.com)</a></div>
            <div class='li3'><a class='a1' href="tel:">Mobile no. (+X)XX-XXX</a></div>
            <div class='li3'>
                <p>👋</p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var clickedTab = $(".tabs > .active");
            var tabWrapper = $(".tab__content");
            var activeTab = tabWrapper.find(".active");
            var activeTabHeight = activeTab.outerHeight();

            activeTab.show();

            tabWrapper.height(activeTabHeight);

            $(".tabs > li").on("click", function() {
                $(".tabs > li").removeClass("active");
                $(this).addClass("active");

                clickedTab = $(".tabs .active");
                activeTab.fadeOut(250, function() {
                    $(".tab__content > li").removeClass("active");

                    var clickedTabIndex = clickedTab.index();

                    $(".tab__content > li").eq(clickedTabIndex).addClass("active");

                    activeTab = $(".tab__content > .active");

                    activeTabHeight = activeTab.outerHeight();
                    tabWrapper
                        .stop()
                        .delay(50)
                        .animate({
                                height: activeTabHeight
                            },
                            500,
                            function() {
                                activeTab.delay(50).fadeIn(250);
                            }
                        );
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.card').click(function() {
                $(this).find('.details-1, .details-2').toggleClass('unfold').parents('.card').siblings().children('.details-1, .details-2').removeClass('unfold');
                $(this).toggleClass('span').siblings('.card').removeClass('span');
            });
        });
    </script>
</body>

</html>
