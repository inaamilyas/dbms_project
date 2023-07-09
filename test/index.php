<?php
include ("connect.php");
$query = "INSERT INTO test(id) VALUES(20)";
$res = sqlsrv_query($conn, $query);
?>