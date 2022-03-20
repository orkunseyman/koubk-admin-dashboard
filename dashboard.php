<?php
require_once("db.php");
require_once("auth_session.php");
$Query = $db->prepare("SELECT * FROM members");
$Query2= $db->prepare("SELECT * FROM events order by id desc limit 0,1");
$Query->execute();
$Query2->execute();
$Counts = $Query->rowCount();
$events = $Query2->fetchAll(PDO::FETCH_ASSOC);
foreach ($events as $event) { 
$attendance= $event["attendance"];
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="UI///styles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css" />
    <style>
        #cards {
            margin-top: 5em;
            margin-left: 1em;
        }

        #pusher {
            margin-left: 11em;
        }

        #imageclub {
            margin-top: 10px;
        }

        .main-content {
            margin-top: 40px;
            margin-left: 5em;
        }
    </style>
</head>

<body>

    <?php
    include_once("sidebar.php")
    ?>

    <div class="pusher" id="pusher">

        <div class="main-content">
            <div class="ui grid stackable padded">
                <div class="five wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header red">
                                <i class="address card icon"></i>
                            </div>
                            <div class="header">
                                <div class="ui red header">
                                    <?php echo $Counts; ?>
                                </div>
                            </div>
                            <div class="meta">
                                members
                            </div>
                            <div class="description">
                                You can find detailed information about members.
                            </div>
                        </div>
                        <div class="extra content">
                            <a href="members.php">
                                <div class="ui two buttons">
                                    <div class="ui red button">Members</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="five wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header yellow">
                                <i class=" calendar plus icon"></i>
                            </div>
                            <div class="header">
                                <div class="ui header yellow"><?php echo $attendance; ?></div>
                            </div>
                            <div class="meta">
                                Last Event's Attendees
                            </div>
                            <div class="description">
                                You can find detailed information about events.
                            </div>
                        </div>
                        <div class="extra content">
                            <a href="events.php">
                                <div class="ui two buttons">
                                    <div class="ui yellow button">Events</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="five wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header teal">
                                <i class="icon briefcase"></i>
                            </div>
                            <div class="header">
                                <div class="ui teal header">4</div>
                            </div>
                            <div class="meta">
                                Teams
                            </div>
                            <div class="description">
                                You can find detailed information about projects.
                            </div>
                        </div>
                        <div class="extra content">
                            <a href="projects.php">
                                <div class="ui two buttons">
                                    <div class="ui teal button">Projects</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</body>

</html>