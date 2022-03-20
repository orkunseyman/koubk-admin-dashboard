<?php
require_once("auth_session.php");
include('db.php');
include('functionevents.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $db->prepare(
		"SELECT * FROM events 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["eventname"] = $row["eventname"];
		$output["description"] = $row["description"];
        $output["attendance"] = $row["attendance"];
        $output["date"] = $row["date"];

	}
	echo json_encode($output);
}
?>