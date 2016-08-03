<?php include_once('libs/login_users.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">PHP ToDo</a>
        </div><div>
</nav>
<!-- end navbar -->
<div class="container">
    <h1 class="text-center">ToDo - PHP App</h1>
    <?php if(isset($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?>

    <div class="register_form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <form method="post" action="login.php">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" id="Email" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
            </form>
            <br><br>
            <a href="#" id="show_login">Already have an account ?</a>
        </div>
    </div>
</div>

<div class="login_form">
    <div class="panel panel-default">
        <div class="panel-heading">

            <h3 class="panel-title">Login</h3>
        </div>
        <form method="post" action="login.php">
            <div class="panel-body">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="login_username" id="username" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="login_password" id="password" aria-describedby="basic-addon1">
                </div>
                <button type="submit" name="login" id="login" class="btn btn-success">Login</button>
        </form>
        <br><br>
        <a href="#" id="show_register">Don't have an account ?</a>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/login.js" type="application/javascript"></script>
</body>
</html>