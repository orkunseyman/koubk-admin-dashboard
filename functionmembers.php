<?php
require_once("auth_session.php");
function get_total_all_records()
{
	include('db.php');
	$statement = $db->prepare("SELECT * FROM members");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>