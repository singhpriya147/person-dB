<?php
$servername="localhost";
$username="root";
$password="";
$dbname="persondb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed". mysqli_connect_error());
}
else{
echo("connection successful");
}
?>