<?php
    $header = "<h2> What is the best color??</h2>";
    $top = "<p>choose your color!!</p>";


    $counter = "";

    $div1 =
    '<div>
    <form method="post">
        <ul>
        <li><input name="option" type="radio" value="red">
            <label class="red">Red</label></li>

        <li><input name="option" type="radio" value="blue">
            <label class="blue">Blue</label></li>

        <li><input name="option" type="radio" value="yellow">
            <label class="yellow">Yellow</label></li>

        <li><input name="option" type="radio" value="green">
            <label class="green">Green</label></li>

        <li><input name="option" type="radio" value="purple">
            <label class="purple">Purple</label></li>

        <li><input name="option" type="radio" value="orange">
            <label class="orange">Orange</label></li>

        <li><input name="option" type="radio" value="pink">
            <label class="pink">Pink</label></li>

        <li><input name="submit" type="submit" value="Submit"> </li>
        </ul>
    </form>
    </div>';
    $bottom = "";

//connects to server locally or remotely
if ($_SERVER['HTTP_HOST'] == 'localhost')
{
  define("HOST", "localhost");
  define("USER", "root");
  define("PASS", "1550");
  define("DB", "colorPoll");
}
else
{
  define("HOST", "localhost");
  define("USER", "colemurn");
  define("PASS", "Singleap4");
  define("DB", "colemurn_colorPoll");
}

$conn = mysqli_connect(HOST, USER, PASS, DB) ;



    if(isset($_POST["submit"])){

         //where user answer stored
         $answer = $_POST["option"];

        //Checks for answer in DB and updates the counter
        $search = "SELECT * FROM polltable WHERE color = '".$answer."';";
        $result = mysqli_query($conn, $search);

        if (mysqli_num_rows($result) > 0){

            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $counter = $rows['counter'];
            }
            //adds to counter when option is picked

            $counter++;
            $sql = "UPDATE polltable SET counter = '$counter' WHERE color = '".$answer."';";
        }

        $result = mysqli_query($conn, $sql);
        $top = "<p>Your input has been taken!</p>";
        $header = "";

        $redCount = "SELECT counter FROM polltable WHERE color = 'red';";
        $redResult = mysqli_query($conn, $redCount);
        $red = $redResult->fetch_object()->counter;

        $blueCount = "SELECT counter FROM polltable WHERE color = 'blue';";
        $blueResult = mysqli_query($conn, $blueCount);
        $blue = $blueResult->fetch_object()->counter;

        $yellowCount = "SELECT counter FROM polltable WHERE color = 'yellow';";
        $yellowResult = mysqli_query($conn, $yellowCount);
        $yellow = $yellowResult->fetch_object()->counter;

        $greenCount = "SELECT counter FROM polltable WHERE color = 'green';";
        $greenResult = mysqli_query($conn, $greenCount);
        $green = $greenResult->fetch_object()->counter;

        $purpleCount = "SELECT counter FROM polltable WHERE color = 'purple';";
        $purpleResult = mysqli_query($conn, $purpleCount);
        $purple = $purpleResult->fetch_object()->counter;

        $orangeCount = "SELECT counter FROM polltable WHERE color = 'orange';";
        $orangeResult = mysqli_query($conn, $orangeCount);
        $orange = $orangeResult->fetch_object()->counter;

        $pinkCount = "SELECT counter FROM polltable WHERE color = 'pink';";
        $pinkResult = mysqli_query($conn, $pinkCount);
        $pink = $pinkResult->fetch_object()->counter;

        $div1 =
        '<div>
            <ul>
            <li><label class="red">Red: '.$red.' votes</label></li>
            <li><label class="blue">Blue: '.$blue.' votes</label></li>
            <li><label class="yellow">Yellow: '.$yellow.' votes</label></li>
            <li><label class="green">Green: '.$green.' votes</label></li>
            <li><label class="purple">Purple: '.$purple.' votes</label></li>
            <li><label class="orange">Orange: '.$orange.' votes</label></li>
            <li><label class="pink">Pink: '.$pink.' votes</label></li>
            </ul>
        </div>';

        $bottom = "<p>Thank you for your input!</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Color Poll</title>
        <link type="text/css" rel="stylesheet" href="./css/style.css" />
    </head>
    <body>

        <?php
            echo $header;
            echo $top;
            echo $div1;
            echo $bottom;

        ?>
    </body>
</html>
