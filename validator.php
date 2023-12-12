<?php
session_start();
include("db_con.php");
	if ($_POST['form_submitted'] == "form_submitted") 
	{		
		$username = $_POST['username'];		
		$password = $_POST['password'];		
		$password = md5(sha1($password));	
		$sql = "SELECT * FROM tb_users WHERE username = '".$username."' AND password = '".$password."' ";		
		$result = $conn->query($sql);			
			if ($result->num_rows > 0) 
			{					
					while ($row = $result->fetch_assoc()) 
					{
						$id = $row["user_id"];					
						$username = $row["username"];					
						$name = $row["name"];
						$user_type = $row["user_type"];					 
					}					
				$_SESSION["user_id"] = $id;
				$_SESSION["username"] = $username;				
				$_SESSION["name"] = $name;
				$_SESSION["user_type"] = $user_type;			
				header("Location: crud.php");	
				die();		 
			}	
			else
			{
				header("Location: index.php?validation=2");
				die();	
			}	
		 
	}
?>