<?php
$server="localhost";
$username="root";
$password="";
// $database="notes";
$con= mysqli_connect($server,$username,$password);
if(!$con){
    die("Connection failed" . mysqli_connect_error());
}
else
{
    echo"Connection successful<br>";
}

?>