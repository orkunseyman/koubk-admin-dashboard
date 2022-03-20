<?php
require_once("auth_session.php");
include('db.php');
include("functionprojects.php");

if(isset($_POST["user_id"]))
{
	$statement = $db->prepare(
		"DELETE FROM projects WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>