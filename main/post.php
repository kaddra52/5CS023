<?php
include('../db_con.php');
$value = $_POST['value'];
$record_id = $_POST['record_id'];
$column_index = $_POST['column_index'];
    if ($column_index == 0)
    {
        $field_name = "name";
    }
    else if ($column_index == 1)
    {
        $field_name = "username";
    }
    else if ($column_index == 2)
    {
        $field_name = "password";  
        $value = md5(sha1($value));	      
    }
    else if ($column_index == 3)
    {
        $field_name = "user_type";
    }
    else if ($column_index == 4)
    {
        $field_name = "phone";
    }
$sql_update = "UPDATE tb_users SET $field_name = '".$value."' WHERE user_id = '".$record_id."' ";		        
$result_update = $conn->query($sql_update);
?>