<?php
require_once("auth_session.php");
include('db.php');
include('functionevents.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $db->prepare("
			INSERT INTO events(eventname, description, attendance, date ) 
			VALUES (:eventname, :description, :attendance, :date)
		");
		$result = $statement->execute(
			array(
				':eventname'	=>	$_POST["eventname"],
				':description'	=>	$_POST["description"],
                ':attendance'	=>	$_POST["attendance"],
                ':date'	=>	$_POST["date"],
			)
		);

	}
	if($_POST["operation"] == "Edit")
	{
        
		$statement = $db->prepare(
			"UPDATE events
			SET  eventname = :eventname, description = :description,   attendance = :attendance, date = :date
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
                ':eventname'	=>	$_POST["eventname"],
                ':description'	=>	$_POST["description"],
                ':attendance'	=>	$_POST["attendance"],
                ':date'	=>	$_POST["date"],
				':id'			=>	$_POST["user_id"]
			)
		);
	}
}
