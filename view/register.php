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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let password = document.getElementById('password').value;
        let job = document.getElementById('job').value;
        if (name == ''){
            alert('Bạn chưa nhập tên đăng nhập');
        }
        else if (password == '')
        {
            alert('Bạn chưa nhập mật khẩu');
        }
        else if (job == ''){
            alert('Bạn chưa nhập nghề nghiệp');
        }
        else{
            alert('Dữ liệu hợp lệ, ta có thể chấp nhận submit form');
            window.location.replace('index.php');
            return true;
        }
        return false;
    }
</script>
<div class="container">
    <h1>Register</h1>
    <form name="registerForm" method="post" onsubmit="return validateForm()">

        Name:<input type="text"  id="name" name="name" placeholder="Enter Name">
        Password: <input type="password"  id="password" name="password" placeholder="Password">
        Job:   <input type="text"  id="job" name="job" placeholder="Enter Job">
        <button type="submit" >Register</button>
    </form>
    <?php
    if ( !$_POST['password'] || !$_POST['name'] || !$_POST['job']){
    }
    else {
        $controller = new UserController();
        $controller->register();
        header("location:login.php");
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
