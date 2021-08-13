<html>
<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fresca" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-1.11.0.js"></script>
    <link href="Css/login.css" rel="stylesheet">
</head>
<style>
    #Submit {
        left: 50px;
    }
</style>

<body>
    <title>Sign up</title>
    <?php
    include_once("Config.php");
    $message = '';
    $message1 = '';
    $message2 = '';

    if (isset($_POST['signup'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $password1 = md5($password);
        $repsw = $_POST['confirmpassword'];
        $query = "SELECT * FROM login WHERE username='$user'";
        $result = mysqli_query($con, $query);

        if ($password != $repsw) {
            $message1 = "Password not matched !!";
        }
        if (mysqli_num_rows($result) == 1) {
            $message2 = "Sorry... Username already exists !!";
        }else {
            $query1 = "INSERT INTO login(username, password) VALUES ('$user', '$password1')";
            $result1 = mysqli_query($con, $query1);
            if ($result1){
            $message = 'Registered. You can now login !!';
            }
        }
    }
    ?>

    <div class='bgimage'>
        <div class='box'>
            <div style = 'position:relative;top:-25px' class='mainbtn'>
                <button class='btn'>Signup Form</button>
            </div>

            <form id='Submit' style='position:absolute;top:50px' class='mainform animate' method='POST'><br/>   
                <div class="message"><?php if ($message != "") {
                                            echo $message;
                                        } ?></div><br/>
                <label><b>Email:</b></label><br>

                <input name='user' class='inputfield' value="<?php echo isset($_POST['user']) ? $_POST['user'] : '' ?>" pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}' type='text' placeholder='Email (characters@characters.domain)' required><br>

                <div class="message"><?php if ($message2 != "") {
                                            echo $message2;
                                        } ?></div>
                <label><b>Password:</b></label><br>
                <input name='password' class='inputfield' type='password' value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" npattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' id='signupinput1' onclick='Function3()' placeholder='6-characters: Digits, Upper and Lower case letters.' required>
                
                <i style='display :none' id='fafa1' onclick='Function1()' class='fa fa-eye' aria-hidden='true'></i><br/><br/>
                <label for='confirmpsw'><b>Confirm Password:</b></label>

                <input name='confirmpassword' class='inputfield' value="<?php echo isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '' ?>" type='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' id='signupinput2' onclick='Function4()' placeholder='Confirm Password' required>

                <i style='display :none' id='fafa2' class='fa fa-eye' onclick='Function2()' aria-hidden='true'></i>
                <div class="message"><?php if ($message1 != "") {
                                            echo $message1;
                                        } ?></div>
                <label style='float:left' class='label'><a href='Login.php'>Go to Login</a></label><br />
                <center><button class='submit' name='signup'>Sign up</button><br></center>
            </form>
        </div>
    </div>

    <script>
        var y = document.getElementById("Submit");

        function Signup() {
            y.style.left = "50px";
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
</body>

</html>