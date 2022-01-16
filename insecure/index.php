<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Insecure</title>
        <link rel="stylesheet" href="./css/style.css" type="text/css">
    </head>
    <body>
      <h1>Login</h1>
<?php
if(isset($_POST['submit'])){

    //opens file
    $openFile = fopen('includes/users.txt', 'r');
    //gets file size
    $users = fread($openFile, filesize('includes/users.txt'));

    //seperates user and password
    $txtfile = explode(',', $users);
    $output = implode('||>><<||', $txtfile);
    $sepUsers = explode('||>><<||', $output);

    //usernames
    $username = [];
    for ($i = 0; $i < sizeof($sepUsers); $i+=2){
        $username[$i+1] = $sepUsers[$i];
    }

    //passwords
    $password = [];
    for ($i = 1; $i < sizeof($sepUsers); $i+=2){
        $password[$i+1] = $sepUsers[$i];
    }

    fclose($openFile);

    //checks if input entered matches up with stored user and passwords
    if(in_array(strtolower($_POST['user']), $username) && in_array(strtolower($_POST['password']), $password)){
        if(strtolower($_POST['user']) == $username[1] && strtolower($_POST['password']) == $password[2]
        || strtolower($_POST['user']) == $username[3] && strtolower($_POST['password']) == $password[4]
        || strtolower($_POST['user']) == $username[5] && strtolower($_POST['password']) == $password[6]
        || strtolower($_POST['user']) == $username[7] && strtolower($_POST['password']) == $password[8]){

//if input matches
         echo '<p class="good">Access Granted!</p>';
//is it doesnt
} else echo '<p class="bad">Access Denied!</p>';
} else echo '<p class="bad2">Access Denied!</p>';

  }

//custom messages for each user
if (strtolower($_POST['user']) == "beavis" && strtolower($_POST['password']) == "password") {
  echo "Yo Beavis, you should really update your password. <br><br>";
}
if (strtolower($_POST['user']) == "butthead" && strtolower($_POST['password']) == "password2") {
  echo "Hello butthead...interesting name. <br><br>";
}
if (strtolower($_POST['user']) == "dana" && strtolower($_POST['password']) == "alien") {
  echo "Good day Dana, your pant suit looks lovely today. <br><br>";
}
if (strtolower($_POST['user']) == "fox" && strtolower($_POST['password']) == "believe") {
  echo "Hello Mr. Mulder, believe in yourself today. <br><br>";
}

?>

        <form method="post">
            <input name="user" type="text" placeholder="Username" value="">
            <input name="password" type="text" placeholder="Password" value=""><br><br>
            <input type="reset">
            <input name= 'submit' type="submit" value="Log In">
        </form>

    </body>
</html>
