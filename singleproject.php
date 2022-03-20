<?php
require_once("auth_session.php");
include('db.php');
include('functionprojects.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $db->prepare(
		"SELECT * FROM projects 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["projectname"] = $row["projectname"];
		$output["githublink"] = $row["githublink"];
        $output["projectteam"] = $row["projectteam"];
        $output["description"] = $row["description"];

	}
	echo json_encode($output);
}
?>