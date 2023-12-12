<?php
include('../db_con.php');
$record_id = $_POST['record_id'];
$query_delete = "DELETE FROM tb_users WHERE user_id = '".$record_id."'"; 
$result_update = $conn->query($query_delete);
?>