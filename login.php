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

    <div class="ui middle aligned center aligned grid">
        <div class="five wide column">
            <img src="./images/koubk.png" class="ui small image centered">
            <h2 class="ui header">Login to Admin Dashboard</h2>
            <div class="ui raised segment">
                <form class="ui big form" method="post" action="loginproccess.php" name="login">

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
</body>

</html>