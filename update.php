<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Fresca" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="Css/login.css" rel="stylesheet">
</head>
<body>
    <div class='bgimage'>
        <div style='overflow:hidden' class='box'>
            <div class='mainbtn'>
                <button class='btn'>Forgot Password</button>
            </div>

            <form id='Login' style = 'position:absolute;top:180px' class='mainform animate' method='get'>
                <label><b>Enter Email:</b></label><br>
                <input name='user' class='inputfield' value='<?php echo isset($_POST['user']) ? $_POST['user'] : '' ?>' type='text' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' placeholder='Email (characters@characters.domain)' required>
                <div id='hidden' class='message'></div>
                <br><br><br><br>
                <center><button class='submit' name='enter'>Enter</button><br></center>
            </form>

            <form id='Submit' style = 'top:-10px; font-size: 20px;' class='form1 animate' method='POST'>
                <div id='hidden2' class='message'></div><br/>
                <label><b>New Password:</b></label><br>
                <input name='password' class='inputfield' type='password' id='signupinput1' onclick='Function3()' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" placeholder='6-characters: Digits, Upper and Lower case letters.' required>
                <i style='display :none' id='fafa1' onclick='Function1()' class='fa fa-eye' aria-hidden='true'></i>
                <div id='hidden1' class='message'></div><br>
                <label for='confirmpsw'><b>Confirm Password:</b></label>
                <input name='confirmpassword' class='inputfield' type='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' id='signupinput2' value="<?php echo isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '' ?>" onclick='Function4()' placeholder='Confirm Password' required><br/>
                <i style='display :none' id='fafa2' class='fa fa-eye' onclick='Function2()' aria-hidden='true'></i><br/><br/>
                <label style = 'float:right'><a href="Task1.php">Go to Login</a></label><br/>
                <center><button class='submit' name='update'>Update</button><br></center>
            </form>
        </div>
    </div>
    <script>
        var x1 = document.getElementById("Login");
        var y1 = document.getElementById("Submit");

        function Signup() {
            x1.style.left = "-400px";
            y1.style.left = "50px";
        }

        function Function1() {
            var y = document.getElementById("signupinput1");
            var passStatus = document.getElementById('fafa1');
            if (y.type == "password") {
                y.type = "text";
                passStatus.className = 'fa fa-eye-slash';
            } else {
                y.type = "password";
                passStatus.className = 'fa fa-eye';
            }
        }

        function Function2() {
            var z = document.getElementById("signupinput2");
            var passStatus = document.getElementById('fafa2');
            if (z.type == "password") {
                z.type = "text";
                passStatus.className = 'fa fa-eye-slash';
            } else {
                z.type = "password";
                passStatus.className = 'fa fa-eye';
            }
        }

        function Function3() {
            document.getElementById('fafa1').style.display = 'block';
        }

        function Function4() {
            document.getElementById('fafa2').style.display = 'block';
        }
    </script>

    <?php
    include_once("Config.php");

    if (isset($_GET['enter'])) {
        $username = $_GET['user'];
        $message = '';

        $query = "SELECT * FROM login WHERE username='$username'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            $message = 'User does not exist !!';
            echo "<script>";
            echo "document.getElementById('hidden').innerHTML = '$message';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "Signup();";
            echo "</script>";
        }
    }

    if (isset($_POST['update'])) {
        $password = $_POST['password'];
        $password1 = md5($password);
        $repsw = $_POST['confirmpassword'];
        $message1 = '';
        $message2 = '';

        if ($password !== $repsw) {
            $message1 = "Password not matched !!";
            echo "<script>";
            echo "document.getElementById('hidden1').innerHTML = '$message1';";
            echo "Signup();";
            echo "</script>";
        } else {
            $query1 = "UPDATE login SET 
            password = '$password1' WHERE username = '$username';";
            $result1 = mysqli_query($con, $query1);
            if ($result1) {
                $message2 = "New Password set !! Now Login";
                echo "<script>";
                echo "document.getElementById('hidden2').innerHTML = '$message2';";
                echo "Signup();";
                echo "</script>";
            }
        }
    }
    ?>
</body>

</html>