<?php
$server="localhost";
$username="root";
$password="";
$database = "online_voting_system";
// $database="notes";
$con= mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("Connection failed" . mysqli_connect_error());
}
else
{
 //   echo"Connection successful<br>";
}
?>
