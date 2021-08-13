<?php
session_start();
?>
<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fresca" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="Css/login.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.js"></script>
</head>

<body>
    <title>Login</title>
    <?php
    include_once("Config.php");
    $message = '';

    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $psw = $_POST['psw'];
        $psw1 = md5($psw);

        $query = "SELECT * FROM login WHERE username='$user' and password = '$psw1'";
        $result = mysqli_query($con, $query);
        $row  = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 0) {
            $message = 'Wrong username or password !!';
        } else {
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];

            if ($_SESSION["username"] == 'abc.18@gmail.com') {
                header("Location:WelcomeAdmin.php");
            } else {
                header("Location:Welcome.php");
            }
        }
    }
    ?>

    <div class='bgimage'>
        <div style='overflow:hidden;' class='box'>
            <div class='mainbtn'>
                <button class='btn'>Login Form</button>
            </div>

            <form id='Login' style='position:absolute;top:100px' class='mainform animate' method='POST'>
                <div class="message"><?php if ($message != "") {
                                            echo $message;
                                        } ?></div><br />
                <label><b>Email:</b></label><br>

                <input name='username' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}' value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" class='inputfield' type='text' placeholder='Email (characters@characters.domain)' required>
                <br/><br/>

                <label><b>Password:</b></label><br>
                <input name='psw' class='inputfield' value="<?php echo isset($_POST['psw']) ? $_POST['psw'] : '' ?>" pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' type='password' id='logininput' onclick='Function2()' placeholder='6-characters: Digits, Upper and Lower case letters.' required>

                <i id='fafa' style='display :none;' onclick='Function1()' class='fa fa-eye' aria-hidden='true'></i>
                <br><br><br>
                <label class='label'>Forgot <a href='update.php'>password?</a></label>
                <label style='float:right' class='label'><a href='Signup.php'>Go to Sign up</a></label><br><br>
                <center><button class='submit' name='login'>Login</button><br></center>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("Login");

        function Login() {
            x.style.left = "50px";
        }

        function Function1() {
            var x = document.getElementById("logininput");
            var passStatus = document.getElementById('fafa');
            if (x.type == "password") {
                x.type = "text";
                passStatus.className = 'fa fa-eye-slash';
            } else {
                x.type = "password";
                passStatus.className = 'fa fa-eye';
            }
        }

        function Function2() {
            document.getElementById('fafa').style.display = 'block';
        }
    </script>

</body>

</html>