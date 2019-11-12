<?php
require_once('connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
}
?>
<html>
    <head>


        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>title</title>

    </head>
    <body class="bodyl">

        <div class="quediv" style="background-color: #666666">
            <div id="log">
                <span style="color: #ffcccc;font-size: 20px;">Welcome   <?php echo $_SESSION['username']; ?></span><form method="POST" action="logout.php"> <input type="submit" name="logout" value="Logout" style="float:right" id="button"></form>
            </div>
            <div style="color: #ffccff;">

                <form action = "answer.php" method = "Post" >
                    <?php
                    $a = array(1, 2, 3, 4, 5);

                    $count = 0;
                    $_SESSION['answers'] = array();
                    $_SESSION['questions'] = array();
                    shuffle($a);
                    $b = array();

                    for ($i = 0; $i < 5; $i++) {
                        $b[$i] = $a[$i];
                    }

                    for ($x = 0; $x < count($b); $x++) {
                        $count++;
                        $chosing = "select * from question where ID='{$b[$x]}'";
                        $result = mysqli_query($connection, $chosing);
                        $rows = mysqli_fetch_assoc($result);

                        array_push($_SESSION['answers'], $rows['CorrectAnswer']);
                        array_push($_SESSION['questions'], $rows['Question']);
                        ?>

                        <div class = "q1">
                            <hr/>
                            <h3><?php echo "Q0" . $count . " " . $rows['Question']; ?></h3>

                            <input type="radio" name="<?php echo 'radio' . $count; ?>" value="A" onchange="showRadio()" /> <?php echo $rows['Answer1']; ?>
                            <br>
                            <input type = "radio" name = "<?php echo 'radio' . $count; ?>" value = "B" onchange="showRadio()"/> <?php echo $rows['Answer2']; ?>
                            <br>
                            <input type = "radio" name = "<?php echo 'radio' . $count; ?>" value ="C" onchange="showRadio()"/> <?php echo $rows['Answer3']; ?>
                            <br>
                            <input type = "radio" name = "<?php echo 'radio' . $count; ?>" value = "D" onchange="showRadio()"/><?php echo $rows['Answer4']; ?>
                            <br>
                        </div>


                        <?php
                    }
                    ?>

                    <div class="btn">
                        <input type="submit" name="check" id="button" value="Check Answers" style="float: right;margin-right: 40px"/>
                    </div>


                </form>

                <br>
            </div>
    </body>
</html>



<?php mysqli_close($connection); ?>