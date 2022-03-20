<?php



if (isset($_SESSION["user_login"])) {
    header("location: dashboard.php");
} ?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css" />
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="UI/styles.css" />

    <head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>KOUBK-LOGIN</title>

        <script src="./UI/jquery-3.6.0.min.js"></script>
        <script src="./UI/Semantic-UI-CSS-master/components/form.js"></script>
        <script src="./UI/Semantic-UI-CSS-master/components/transition.js"></script>
        <link rel="stylesheet" href="style.css" />
        <style type="text/css">

        </style>

    </head>

<body>

    <div class="ui middle aligned center aligned grid">
        <div class="five wide column">
            <img src="./images/koubk.png" class="ui small image centered">
            <h2 class="ui header">Error Login</h2>
            <div class="ui raised segment">
                <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                        Error Username or Password
                    </div>
                    <a href="login.php"><p>Back to Login
                    </p></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>