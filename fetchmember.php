<?php
require_once("auth_session.php");
include('db.php');
include('functionmembers.php');
$query = '';
$output = array();
$query .= "SELECT * FROM members";



$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["name"];
	$sub_array[] = $row["email"];
    $sub_array[] = $row["department"];
    $sub_array[] = $row["grade"];
    $sub_array[] = $row["phone"];
    $sub_array[] = $row["interest"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="ui tiny yellow button update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="ui tiny red button delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>