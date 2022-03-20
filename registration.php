<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css" />
<style>
    .ui.raised.segment{
        margin-top: 4em;
    }
</style>
</head>

<body>
    <?php
    require('db.php');
    require_once("auth_session.php");


    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);
        $email    = stripslashes($_REQUEST['email']);
        $password = stripslashes($_REQUEST['password']);
        $create_datetime = date("Y-m-d H:i:s");
        $query=$db->prepare("INSERT into `users` (username, password, email, create_datetime)
        VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')");
        $query->execute(); 
        if ($query) {
            header("Location: dashboard.php");
        }
    } else {
    ?>
        <?php
    include_once("sidebar.php")
    ?>
        <div class="ui middle aligned center aligned grid">
            <div class="five wide column">
                <div class="ui raised segment">
                    <form class="ui big form" method="post" name="login">

                        <div class="field">
                            <form class="form" action="" method="post">
                                <h1 class="login-title">Add New User</h1>
                                <input type="text" class="login-input" name="username" placeholder="Username" required />
                                <div class="ui divider"></div>
                                <input type="text" class="login-input" name="email" placeholder="Email Adress">
                                <div class="ui divider"></div>
                                <input type="password" class="login-input" name="password" placeholder="Password">
                                <div class="ui divider"></div>
                                <input type="submit" value="Add" name="submit" class="ui fluid large red submit button" />
                                <div class="ui error message"></div>
                            </form>
                        </div>
                </div>
            <?php
        }
            ?>
</body>

</html>