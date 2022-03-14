<?php

require_once("auth_session.php");
require_once('db.php');

$sql = "SELECT id, username, email FROM users";
$result = $con->query($sql);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="UI/Semantic-UI-CSS-master///semantic.min.css" />
    <meta charset="utf-8">
    <title>Dashboard Main</title>
    <link rel="stylesheet" href="UI/styles.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>
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


                <a class="item" href="">
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
            <div class="twelve wide column">
                <table id="userTable" class="stripe row-border">
                    <thead>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($arr_users)) { ?>
                            <?php foreach ($arr_users as $user) { ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>

</html>