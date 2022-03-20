<?php
require_once("auth_session.php");
include('db.php');
include('functionmembers.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $db->prepare(
		"SELECT * FROM members 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] = $row["name"];
		$output["email"] = $row["email"];
        $output["department"] = $row["department"];
        $output["grade"] = $row["grade"];
        $output["phone"] = $row["phone"];
        $output["interest"] = $row["interest"];

	}
	echo json_encode($output);
}
?>