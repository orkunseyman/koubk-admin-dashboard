<?php
require_once("auth_session.php");
include('db.php');
include('functionmembers.php');
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $statement = $db->prepare("
			INSERT INTO members(name, email, department, grade, phone, interest ) 
			VALUES (:name, :email, :department, :grade, :phone, :interest )
		");
        $result = $statement->execute(
            array(
                ':name'    =>    $_POST["name"],
                ':email'    =>    $_POST["email"],
                ':department'    =>    $_POST["department"],
                ':grade'    =>    $_POST["grade"],
                ':phone'    =>    $_POST["phone"],
                ':interest'    =>    $_POST["interest"]
            )
        );
    }
    if ($_POST["operation"] == "Edit") {

        $statement = $db->prepare(
            "UPDATE members
			SET name = :name, email = :email, department = :department,   grade = :grade, phone = :phone, interest = :interest
			WHERE id = :id
			"
        );
        $result = $statement->execute(
            array(
                ':name'    =>    $_POST["name"],
                ':email'    =>    $_POST["email"],
                ':department'    =>    $_POST["department"],
                ':grade'    =>    $_POST["grade"],
                ':phone'    =>    $_POST["phone"],
                ':interest'    =>    $_POST["interest"],
                ':id'            =>    $_POST["user_id"]
            )
        );
    }
}
