<?php
$servername = "DESKTOP-O190S29"; //Server Name
$conInfo = array("Database"=>"LibraryManagementSystem");
$conn = sqlsrv_connect($servername, $conInfo);

// if($conn){
//     echo "Conection done<br>";
// }
// else{
//     echo "no connection ";
// }
?>

<!-- // include ("connect.php");
// $query = "INSERT INTO test(id) VALUES(20)";
// $res = sqlsrv_query($conn, $query); -->