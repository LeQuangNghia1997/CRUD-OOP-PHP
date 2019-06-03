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
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    session_start();
    $name = $_SESSION['name'];
    $controller = new UserController();
    $user = $controller->findName($name)
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Job</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><?php echo $user->id?></th>
            <td><?php echo $user->name?></td>
            <td><?php echo $user->job?></td>
            <td><button id="edit">Edit</button></td>
            <div>
                <form method="get" id="show">
                    <input type="hidden" name="show" value="show" hidden>
                    <td><button type="submit" >Show</button></td>

                </form>
                <?php
                if ($_GET['show'] == "show"){
                    $controller->findName($name);
                    header('Location: dashboard.php');
                }
                ?>
            </div>
        </tr>
        </tbody>
    </table>
    <div>
        <form  method="post" id="update_form" style="display: none">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->id?>" >
            Name:<input type="text" name="edit_name" value="<?php echo $user->name?>">
            Job:<input type="text" name="edit_job" value="<?php echo $user->job?>">
            <button type="submit" id="update"> UPDATE</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#edit").click(function () {
                $("#update_form").toggle();
            });
            $("#update").click(function (event) {
                event.preventDefault();
                var data = $("#update_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: 'update.php',
                    data: data,
                    success: function (respone) {
                        $(".container").html(respone);
                    }
                })
            });
        });
    </script>
    <div>
        <form method="get" id="logout">
            <input type="hidden" name="logout" value="logout" hidden>
            <button type="submit" >Log out</button>
        </form>
        <?php
        if ($_GET['logout'] == "logout"){
            $controller->logout();
            header('Location: login.php');
        }
        ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
