<?php ?>
<?php
session_start();
require_once('connection.php');
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['conpassword'];

    if ($password == $cpassword) {

        $username = $_POST['username'];
        $email = $_POST['email'];

        $pwd = sha1($password);

        $chosing = "select * from loginform where User='$username'";
        $result = mysqli_query($connection, $chosing);
        $num = mysqli_num_rows($result);
        if ($num == 1) {

            $message = "user already add";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: login.php');
        } else {
            $query = "INSERT INTO loginform (User,Pass,Email) VALUES ('{$username}','{$pwd}','{$email}')";
            $result = mysqli_query($connection, $query);
            $_SESSION['username'] = $name;
            header('Location: question.php');
        }
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>title</title>
    </head>
    <body class="bodyl">

        <div class="wdiv"><h1 class="hw1">QUIZ ...</h1>

            <form method="POST" action="register.php">
                <fieldset class="fieldst">
                    <legend style="align-content: center"><img src="image/login.png"/></legend>
                    <div class="form_input">
                        <input type="text" name="username" placeholder="User Name" class="tf"/>
                    </div>
                    <div class="form_input">
                        <input type="email" name="email" placeholder="Email" class="tf"/>
                    </div>
                    <div class="form_input">
                        <input type="password" name="password" placeholder="Password" class="tf"/>
                    </div>
                    <div class="form_input">
                        <input type="password" name="conpassword" placeholder="Conform Password" class="tf"/>
                    </div>
                    <input type="submit" name="submit" value="REGISTER" class="bttn" id="button">
                </fieldset>
            </form>
        </div>


    </body>
</html>


<?php mysqli_close($connection); ?>
