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
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<script>
      function validateLogin() {
        let name = document.getElementById('name').value;
        let password = document.getElementById('password').value;

        if(name == ''){
            alert('Vui long nhap ten');
        }
        if(password == ''){
            alert('Vui long nhap mat khau');
        }
    }
</script>
<form method="post" onsubmit="return validateLogin()">
    <label>name
        <input type="text" id="name" name="name"
    </label>
    <label>Password
        <input type="password" id="password" name="password">
    </label>
    <button type="submit">login</button>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $controller = new UserController();
        $controller->login();
        if ($controller->login()){
            session_start();
            $_SESSION['name'] = $_POST['name'];
            header('Location: list.php');
        } else echo "login Erro";
    }
    ?>
</form>
</body>
</html>
