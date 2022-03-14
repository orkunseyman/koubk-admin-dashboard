<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="UI/Semantic-UI-CSS-master///semantic.min.css" />
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />

<head>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<title>KOUBK-LOGIN</title>

<script src="./UI/jquery-3.6.0.min.js"></script>
<script src="./UI/Semantic-UI-CSS-master/components/form.js"></script>
<script src="./UI/Semantic-UI-CSS-master/components/transition.js"></script>

<style type="text/css">
    body {
        background-color: #DADADA;
    }

    body>.grid {
        height: 100%;
    }

    .image {
        margin-top: -100px;
    }

    .column {
        max-width: 450px;
    }
</style>
<script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        email: {
                            identifier: 'email',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Please enter your e-mail'
                                },
                                {
                                    type: 'email',
                                    prompt: 'Please enter a valid e-mail'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Please enter your password'
                                },
                
                            ]
                        }
                    }
                });
        });
</script>
</head>

<body>
    <?php
    require('db.php');
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>

<div class="ui middle aligned center aligned grid">
        <div class="nine wide column">
            <img src="./images/koubk.png" class="ui small image centered">
            <h2 class="ui header">Login to Admin Dashboard</h2>
            <div class="ui raised segment">
                <form class="ui big form" method="post" name="login">

                    <div class="field">
                        
                        <div class="ui left icon input">
                            <i class="user circle icon"></i>
                            <input type="text" name="username" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <input type="submit" value="Login" name="submit" class="ui fluid large red submit button" />


                    <div class="ui error message"></div>

                </form>
                
            </div>
        </div>
    </div>

    <?php
    }
    ?>
</body>

</html>