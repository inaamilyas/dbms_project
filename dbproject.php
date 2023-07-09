<?php
$servername = "DESKTOP-O190S29"; //Server Name
// $conInfo = array("Database"=>"testdb", "User"=>"root", "PSD"=>"blank");
$conInfo = array("Database"=>"testdb");
$conn = sqlsrv_connect($servername, $conInfo);
if(!$conn){
    echo "Conection done<br>";
    echo $conn;
}
else{
    echo "no connection ";
    echo $conn;
}
?>