<?php
session_start();
require_once('connection.php');
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $password = ($_POST['password']);
    $pass = sha1($password);



    $chosing = "select * from loginform where User='$name' && Pass='$pass'";
    $result = mysqli_query($connection, $chosing);
    $validity = mysqli_num_rows($result);


    if ($validity >= 1) {
        //echo "okkkkk";
        $_SESSION['username'] = $name;
        header('Location: question.php');
        exit();
    } else {
        //echo "nooo";
        header('Location:login.php');
        exit();
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

            <form method="POST" action="login.php">
                <fieldset class="fieldst">

                    <legend style="align-content: center"><img src="image/login.png"/></legend>
                    <div class="form_input">
                        <input type="text" name="username" placeholder="User Name" class="tf"/>
                    </div>
                    <div class="form_input">
                        <input type="password" name="password" placeholder="Password" class="tf"/>
                    </div>
                    <input type="submit" name="submit" value="LOGIN" class="bttn" id="button">
                    <div class="new"><h3 style="color: #ffccff">If new user → </h3><a href="register.php" style="font-size: 19px;color: #990033;text-align: right"><h5>REGISTER</h5></a>

                    </div>

                </fieldset>
            </form>
        </div>

        <?php ?>
    </body>
</html>

<?php mysqli_close($connection); ?>

