<?php

use Controller\UserController;
use Model\User;

require "../model/User.php";
require "../model/UserDB.php";
require "../model/DBConnection.php";
require "../controller/UserController.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$name = $_SESSION['name'];
$controller = new UserController();
$user = $controller->findName($name);
echo "Hello {$user->name}, you are the {$user->id}-st users in this system,
your job is {$user->job}, you will be logout after 10s";
?>
<div id="timeOut"></div>
<div>
    <form method="get">
        <input type="hidden" name="logout" value="logout" hidden>
        <button type="submit" >Log out</button>
    </form>
    <?php
    if ($_GET['logout'] === "logout"){
        $controller->logout();
        header('Location: login.php');
    }
    ?>
</div>
<script>
    let timeOut = 11;
    function time(){
        timeOut--;
        document.getElementById('timeOut').innerHTML = timeOut;
        setTimeout('time()',1000);
        if (timeOut === 0){
            <?php
            session_destroy()
            ?>
            alert("Time out");
            window.location.replace('login.php');
        }
    }
    time();

</script>
</body>
</html>
