<?php
session_start();
$page_name = "The Libros(Main Page)";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Londrina Solid" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="Css/Task1.css" rel="stylesheet" id='theme'>
    <script src="http://www.webglearth.com/v2/api.js"></script>
    <script>
      function initialize() {
        var earth = new WE.map('earth_div');
        WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(earth);

        var marker = WE.marker([51.5, -0.09]).addTo(earth);
        marker.bindPopup("<div style = 'font-family:\"Londrina Solid\";font-size:15px'><b>Hello!</b> I am Libros.<br /><span style='font-size:14px;color:#999'>Looking for me??<br/>Location: <b>Write location here(Line22 Task1)</b></span></div>", {maxWidth: 150, closeButton: true}).openPopup();

        var markerCustom = WE.marker([50, -9], '/img/logo-webglearth-white-100.png', 100, 24).addTo(earth);

        earth.setView([51.505, 0], 1.7);
      }
    </script>
    <title>The Libros</title>
</head>

<body onload="initialize()">
    <button onclick="topFunction()" id="myBtn">Back to Top</button>
    <div class="header">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>
    <div id="navbar" style='height:83px;' class="div1">
        <input type="checkbox" id="check">
        <label for="check" id="hamburger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </label>
        <ul>
            <li>
                <a href="Task1.php" rel="Home page">Home</a>
            <li>
                <a href="About.php">About</a>
            </li>
            <li>
                <a href="index.php" rel="Products">Products</a>
            </li>
            <li>
                <a href="Login.php" rel="Log In">Login</a>
            </li>
            <li>
                <a href="contact.php" rel="Contact">Contact</a>
            </li>
        </ul>
    </div>

    <div id="navbar1" class='login'>
        <?php
        if ($_SESSION["username"]) {
        ?>
            Logged In. Click to <a href="logout.php" title="Logout">Logout.</a>
        <?php
        } else {
            header("Location:Login.php");
        };
        ?>
    </div>

    <?php
    include "webcounter.php";
    $access_number = visitor($page_name);
    ?>
    <div class=div3>
        <div class="snorlax">
            <div class="snorlax__head">
                <div class="snorlax__head-outline"></div>
                <div class="snorlax__ear snorlax__ear--left"></div>
                <div class="snorlax__ear snorlax__ear--right"></div>
                <div class="snorlax__brow snorlax__brow--left"></div>
                <div class="snorlax__brow snorlax__brow--right"></div>
                <div class="snorlax__eye snorlax__eye--left"></div>
                <div class="snorlax__eye snorlax__eye--right"></div>
                <div class="snorlax__mouth">
                    <div class="snorlax__tooth snorlax__tooth--left"></div>
                    <div class="snorlax__tooth snorlax__tooth--right"></div>
                </div>
            </div>
            <div class="snorlax__arm-left">
                <div class="snorlax__arm-wrapper">
                    <div class="snorlax__claws--left"></div>
                    <div class="snorlax__arm-left-arm"></div>
                </div>
            </div>
            <div class="snorlax__arm-right">
                <div class="snorlax__claws--right"></div>
                <div class="snorlax__arm-right-arm"></div>
                <div class="snorlax__claw"></div>
            </div>
            <div class="snorlax__body">
                <div class="snorlax__body-shade"></div>
                <div class="snorlax__belly">
                    <div class="snorlax__belly-segment snorlax__belly-segment--one"></div>
                    <div class="snorlax__belly-segment snorlax__belly-segment--two"></div>
                </div>
            </div>
            <div class="snorlax__left-foot">
                <div class="snorlax__left-foot-foot"></div>
                <div class="snorlax__foot-claw snorlax__foot-claw--one">
                    <div></div>
                </div>
                <div class="snorlax__foot-claw snorlax__foot-claw--two">
                    <div></div>
                </div>
                <div class="snorlax__foot-claw snorlax__foot-claw--three">
                    <div></div>
                </div>
            </div>
            <div class="snorlax__right-foot">
                <div class="snorlax__right-foot-foot"></div>
                <div class="snorlax__foot-claw snorlax__foot-claw--four">
                    <div></div>
                </div>
                <div class="snorlax__foot-claw snorlax__foot-claw--five">
                    <div></div>
                </div>
                <div class="snorlax__foot-claw snorlax__foot-claw--six">
                    <div></div>
                </div>
            </div>
        </div>
        <a style='top:10px' href="#div0"><button style='top:10px' class="snorlax_button"><img src="Pictures/down_white.png"></button></a>
    </div>
    <div class="div0" id="div0">
        <div class="main">
            <center>Libros</center> 
        </div>
        <br><br>
        <h4 style="top:130px;left:50px;position:relative;font-size:50px;" class="wordCarousel">
            <span class='sb1'>Deals in: </span>
            <div>
                <ul class="flip4">
                    <li class='li1'> Stationery</li>
                    <li class='li1'> Books</li>
                    <li class='li1'> Sports</li>
                    <li class='li1'>Gift Item</li>
                </ul>
            </div>
        </h4>
        <br><br>
        <center>
            <div class="down">
                <a href="#start">
                    <div class='downarrow'>
                        <div class="downdiv"></div>
                        <img class='downimg' src='Pictures/down.png'>
                    </div>
                </a>
            </div>
        </center>
        <div class="circle">
            <div class="getstarted">
                <a href='#start'>Get Started</a>
            </div>
        </div>
    </div>
    <script>
        var navbar = document.getElementById("navbar");
        var navbar1 = document.getElementById("navbar1");
        var sticky = navbar.offsetTop;
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
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

        function topFunction() {
            document.documentElement.scrollTop = 0;
        }
    </script>
    <div id="start" style="clear:both"></div>
    <section class="services">
        <center>
            <h1>Our Services</h1>
        </center>
        <p id='service' style = 'font-family:  Menlo, monospace'>Libros is a stationery giant which also deals in books, sports & gift items.
            Providing a large
            variety of items in one place along with the experience of more than 40 years Libros is well-known in the
            local market
            with good reputation.
        </p>
        <div class='mainbox'>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="sign">
                            <span class="fast-flicker">S</span>tatio<span class="flicker">ne</span>ry
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <img class="servicesimg" src='Pictures/Services1.png'>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div id="app">
                            <div class="wrapper">
                                <div class="page hyou hyou1"></div>
                                <div class="page hyou hyou2"></div>
                                <div class="hyou sebyo"></div>
                                <div class="siori"></div>
                                <div class="page papers page-left">
                                    <center><b>Libros</b></center>deals in books, stationery,
                                </div>
                                <div class="page papers page-right">
                                    sports and gift items.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <div class="sign">
                            <span class="fast-flicker">B</span>oo<span class="flicker">k</span>s
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="sign">
                            <span class="fast-flicker">S</span>po<span class="flicker">r</span>ts
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <img class="servicesimg" src='Pictures/pic2.jpg'>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about">
        <center>
            <h1>About Us</h1>
        </center>
        <div class="mainbox">
            <div class="card green center">
                <div class="additional">
                    <div class="user-card">
                        <div class="level center">
                            Since
                        </div>
                        <div class="points center">
                            1970's
                        </div>
                    </div>
                    <div class="more-info">
                        <h1>M.Bilal</h1>
                        <div style='text-align:center;color: #00bff3;' class="coords">
                            <span>Brand Owner</span>
                        </div>
                        <div class="coords1">
                            <div style = 'color: #00bff3;'>Email:</div>
                            <div>Write email here line295 in Task1.php</div>
                        </div>
                        <div class="coords1">
                            <div style = 'color: #00bff3;'>Location:</div>
                            <div>Write location here line299 in Task1.php</div>
                        </div>
                        <div class="coords1">
                            <div style = 'color: #00bff3;'>Mobile No.:</div>
                            <div>Write mobile no. here line303 in Task1.php</div>
                        </div>
                    </div>
                </div>
                <div class="general">
                    <h1>Libros</h1>
                    <p>Libros deals in:</p>
                    <p>1. Sports</p>
                    <p>2. Stationery</p>
                    <p>3. Books</p>
                    <span class="more">Mouse over for more info</span>
                </div>
            </div>
            <div class="container3">
                <div class="card1">
                    <a href='About.html'>
                        <h2>Libros</h2>
                        <i class="fa fa-arrow-right"></i>
                        <p>A Gaint.</p>
                    </a>
                    <div class="pic"></div>
                    <div class="ul2">
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                        <div class="li2"></div>
                    </div>
                    <div class="social">
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="i1 fa fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="i1 fa fa-instagram"></i> </a>
                    </div>
                    <button>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="map" style='margin-top:0%'>
        <h1>Our Location</h1>
        <div class="mainbox">
            <div id="earth_div"></div>
        </div>
    </section>
    <br><br><br>
    <center>
        <div id="slideshow-container">
            <div class="mySlides">
                <img class="sliderimage" src="https://thesportmall2012.files.wordpress.com/2014/05/sport-items-online.jpg">
                <div class="text">Sports</div>
            </div>
            <div class="mySlides">
                <img class="sliderimage" src="https://cdn.pixabay.com/photo/2020/02/14/17/39/crawling-4848985__340.jpg">
                <div class="text">Stationery</div>
            </div>
            <div class="mySlides">
                <img class="sliderimage" src="https://assets.entrepreneur.com/content/3x2/2000/20191219170611-GettyImages-1152794789.jpeg?width=700&crop=2:1">
                <div class="text">Books</div>
            </div>
            <button class="prev" onclick="prevSlide()">&#10094;</button>
            <button class="next" onclick="nextSlide()">&#10095;</button>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </center>
    <script>
        var t;
        var butt = 0;
        var slideIndex = 1;

        function union() {
            showSlides();
        }
        union();

        function nextSlide() {
            butt = 1;
            clearTimeout(t);
            slideIndex += 1;
            union();
        }

        function prevSlide() {
            butt = 1;
            clearTimeout(t);
            slideIndex -= 1;
            union();
        }

        function currentSlide(n) {
            clearTimeout(t);
            slideIndex = n;
            union();
        }

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            if (slideIndex < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

            if (butt < 1) {
                slideIndex++
            }
            butt = 0;
            t = setTimeout(showSlides, 3000);
        }
    </script>
    <div class='footer'>
        <div style='list-style-type:none' class='ul3'>
            <div class='li3'><a class='a1' href="mailto:">Email (XXX@gmail.com)</a></div>
            <div class='li3'><a class='a1' href="tel:">Mobile no. (+X)XX-XXX</a></div>
            <div class='li3'>
                <p>👋</p>
            </div>
        </div>
    </div>
</body>

</html>