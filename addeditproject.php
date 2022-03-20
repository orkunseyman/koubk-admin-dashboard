<?php
require_once("auth_session.php");
include('db.php');
include('functionprojects.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $db->prepare("
			INSERT INTO projects(projectname, description, projectteam, githublink) 
			VALUES (:projectname, :description, :projectteam, :githublink)
		");
		$result = $statement->execute(
			array(
				':projectname'	=>	$_POST["projectname"],
				':description'	=>	$_POST["description"],
                ':projectteam'	=>	$_POST["projectteam"],
                ':githublink'	=>	$_POST["githublink"],
			)
		);

	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $db->prepare(
			"UPDATE projects
			SET projectname = :projectname, description = :description,projectteam = :projectteam, githublink = :githublink
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
                ':projectname'	=>	$_POST["projectname"],
                ':description'	=>	$_POST["description"],
                ':projectteam'	=>	$_POST["projectteam"],
                ':githublink'	=>	$_POST["githublink"],
                ':id'			=>	$_POST["user_id"]
			)
		);
	}
}

?>