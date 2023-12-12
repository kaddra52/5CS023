<?php
session_start();
	if (empty($_SESSION['user_id']) || $_SESSION['user_id'] == '')
	{
	    header("Location: index.php?validation=3");
	    die();
	} 
include('db_con.php');
require 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new Twig\Environment($loader);
$acknowledgment_message_style = "display:none;";
  if (isset ($_POST["form_submitted"]))
  {    
    if ($_POST["form_submitted"] == "form_submitted")
    {     
        $name = $_POST["name"];        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5(sha1($password));
        $user_type = $_POST["user_type"];
        $phone = $_POST["phone"];
        //$phone2 = $phone;
        $sql_insert = "INSERT INTO tb_users(username, password, name, user_type, phone) VALUES('".$username."', '".$password."', '".$name."', '".$user_type."', '".$phone."')";		
        $result = $conn->query($sql_insert);
        $acknowledgment_message_style = "display:block;";
    }
  }
 
echo $twig->render('crud_operations.php', array('title' => $acknowledgment_message_style, 'name' => $_SESSION["name"]));
?>
