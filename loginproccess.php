<?php
session_start();

require_once 'db.php';

if (isset($_POST['username'])) 
{

    $username = strip_tags($_REQUEST["username"]); 
    $password  = strip_tags($_REQUEST["password"]);
    $password=md5($password);

    try {
    
            $Query = $db->prepare("SELECT * FROM users WHERE username = :uname");
            $Query->bindParam(':uname', $username);
            $Query->execute(); 
            $Counts = $Query->rowCount();
            $row = $Query->fetch(PDO::FETCH_ASSOC);
            if ($Counts > 0) 
            {
               
                if ($username == $row["username"]) 
                {
                    if ($password==$row["password"]) 
                    {
                        echo"sadasd";   
                        $_SESSION["user_login"] = $row["username"]; 
                        header("Location: dashboard.php");  
                    } else {
                        header("Location: error.php");
                    }
                } else {
                    header("Location: error.php");
                }
            } else {
                header("Location: error.php");
            }
        } catch (PDOException $e) {
            echo $e;

        }
    }
  
?>