<?php
require_once("auth_session.php");
include('db.php');
include("functionevents.php");

if(isset($_POST["user_id"]))
{
	$statement = $db->prepare(
		"DELETE FROM events WHERE id = :id"
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