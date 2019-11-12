<?php
require_once('connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["check"])) {
            $q1 = $_POST['radio1'];
            $q2 = $_POST['radio2'];
            $q3 = $_POST['radio3'];
            $q4 = $_POST['radio4'];
            $q5 = $_POST['radio5'];
        }
    }
}
?>

<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" type="text/css" href="styles.css">

        <style>
            .popup {
                position: relative;
                display: inline-block;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .popup .popuptext {
                font-size:1px;
                visibility: hidden;
                width: 200%;
                background-color: #006666;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 8px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -80px;
            }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class - hide and show the popup */
            .popup .show {
                visibility: visible;
                -webkit-animation: fadeIn 1s;
                animation: fadeIn 1s;
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
                from {opacity: 0;}
                to {opacity: 1;}
            }

            @keyframes fadeIn {
                from {opacity: 0;}
                to {opacity:1 ;}
            }

        </style>

        <script>
            function myFunction1() {
                var popup = document.getElementById("myPopup1");
                popup.classList.toggle("show");
            }

        </script>
    </head>
    <body class="bodyl">
        <div class="wdiv">

            <div id="log">
                <span style="color: #ffcccc;font-size: 20px;">Welcome   <?php echo $_SESSION['username']; ?></span>

                <form method="POST" action="logout.php">
                    <input id="button" type="submit" name="logout" value="Logout" style="float:right ">
                </form>
            </div>
            <div class="reslt">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <h2>Your result is..</h2>

                <?php
                $score = 0;
                if (isset($_POST['check'])) {

                    for ($x = 0; $x < count($_SESSION['answers']); $x++) {
                        $y = $x + 1;

                        if ($_POST['radio' . $y] != '') {




                            if ($_SESSION["answers"][$x] == $_POST['radio' . $y]) {
                                $score = $score + 1;
                            } else {
                                $score = $score + 0;
                            }
                            //echo $_SESSION["questions"][$x]." ";
                            //echo $_SESSION["answers"][$x]." ";
                            //echo $_POST['ans'.$y]."<br>";
                        } else {
                            ?>
                            <script type="text/javascript"> window.alert("Answer all questions");</script><?php
                            header("Location: question.php");
                        }
                    }
                }
                ?>

                <img src="image/giphy.gif" width="40%" height="50px"/>
                <span style="font-size: 120%"> <?php echo $score . "/5"; ?></span>
                <img src="image/giphy.gif" width="35%" height="50px"/>


                <div class="popup" > <p><input type="submit" name="submit" value="View details" onclick="myFunction1()" id="button"/></p>
                    <span class="popuptext" id="myPopup1">
                        <div style="margin-left: 30%">

                            <table border="1" style="text-align: center">
                                <tr style="color: whitesmoke;
                                    text-align: center">
                                    <th>Question No</th>
                                    <th>Result</th>
                                </tr>
                                <?php
                                for ($x = 0; $x < count($_SESSION['answers']); $x++) {
                                    $y = $x + 1;
                                    $result;
                                    if ($_SESSION["answers"][$x] == $_POST['radio' . $y]) {
                                        $result = "Correct";
                                    } else {
                                        $result = "Wrong";
                                    }
                                    ?>


                                    <tr style="color: #ffccff">
                                        <td><?php echo $y;
                                    ?></td>
                                        <td><?php echo $result; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </span>
                </div>
                <br>
            </div>

        </div>


    </body>
</html>


<?php mysqli_close($connection); ?>