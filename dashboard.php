<?php

require_once("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="UI/Semantic-UI-CSS-master///semantic.min.css" />
    <meta charset="utf-8">
    <title>Dashboard Main</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>


    <div class="ui sidebar inverted visible vertical menu sidebar-menu" id="sidebar">

        <div class="item">
            <div class="ui medium header red">
                KOUBK-Admin
            </div>
        </div>
        <div class="item">

            <div class="menu">
                <a class="item">
                    <div class="ui large header inverted">
                        <i class="icon tachometer alternate"></i>
                        Dashboard
                    </div>
                </a>
            </div>
        </div>
        <div class="item">
            <div class="menu">


                <a class="item" href="members.php">
                    <div class="ui large header inverted">

                        <i class="address card icon"></i>
                        Members
                    </div>
                </a>
                <div class="ui divider"></div>


                <a class="item" href="">
                    <div class="ui large header inverted">

                        <i class="tasks icon"></i>
                        Tasks
                    </div>
                </a>

                <div class="ui divider"></div>

                <a class="item" href="">
                    <div class="ui large header inverted">

                        <i class="calendar plus icon"></i>
                        Events
                    </div>
                </a>

                <div class="ui divider"></div>

                <a class="item" href="">
                    <div class="ui large header inverted">

                        <i class="users icon"></i>
                        Teams
                    </div>
                </a>
                <div class="ui divider"></div>
                <a class="item" href="">
                    <div class="ui large header inverted">

                        <i class="code icon"></i>
                        Projects
                    </div>
                </a>

                <div class="ui divider"></div>

                <a class="item" href="logout.php">
                    <div class="ui large header inverted">
                        <i class="cogs icon"></i>
                        Logout
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="pusher">
        <div class="ui centered grid container">
            <div class="ten wide column">

            </div>
        </div>
</div>
</body>

</html>