<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Londrina Solid" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galindo" rel='stylesheet'>
    <link href="Css/Task1.css" rel="stylesheet" id='theme'>
    <title>Contact Us</title>
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $message = '';
    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $call = $_POST['call-phone'];
        $text = $_POST['message'];

        require 'C:\xampp\htdocs\Project\PHPMailer\src\Exception.php';
        require 'C:\xampp\htdocs\Project\PHPMailer\src\PHPMailer.php';
        require 'C:\xampp\htdocs\Project\PHPMailer\src\SMTP.php';

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username = 'XXXX@gmail.com';//Write password and username here
            $mail->Password = 'XXX!';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom($email, $firstname . $lastname);
            $mail->addAddress('XXX@gmail.com', 'XXX');
            $mail->addReplyTo($email, $firstname . $lastname);

            $mail->isHTML(true);
            $mail->Subject = 'Message from website';
            $mail->Body    = $text;

            $mail->send();
            $message = 'Message has been sent !!';
        } catch (Exception $e) {
            $message = "Message could not be sent !!";
        }
    }
    ?>

    <form method="POST">
        <div class="container">
            <center>
                <h1>Contact Us</h1>
            </center>
            <div class="message"><?php if ($message != "") {
                                        echo $message;
                                    } ?></div><br />
            <div class="subcontainer">
                <div class="column">
                    <div class="inputbox">
                        <input type="text" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                        <span class="inputtext">First Name</span>
                        <span class="inputline"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="inputbox">
                        <input type="text" name="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                        <span class="inputtext">Last Name</span>
                        <span class="inputline"></span>
                    </div>
                </div>
            </div>
            <div class="subcontainer">
                <div class="column">
                    <div class="inputbox">
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                        <span class="inputtext">Email</span>
                        <span class="inputline"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="inputbox">
                        <input type='text' name="call-phone" value="<?php echo isset($_POST['call-phone']) ? $_POST['call-phone'] : '' ?>" required>
                        <span class="inputtext">Mobile</span>
                        <span class="inputline"></span>
                    </div>
                </div>
            </div>
            <div class="subcontainer">
                <div class="column">
                    <div class="inputbox textarea">
                        <textarea minlength="10" name="message" value="<?php echo isset($_POST['message']) ? $_POST['message'] : '' ?>" required></textarea>
                        <span class="inputtext">Type your message here</span>
                        <span class="inputline"></span>
                    </div>
                </div>
            </div>
            <div class="subcontainer">
                <div class="column">
                    <button name='submit' id="send">Send</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>