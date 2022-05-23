<?php

$server ="localhost";
$username = "root";
$password = "prabhakar@erp";
$db = "Registration";

$con = mysqli_connect($server,$username,$password,$db);

if(!$con){
    die("connection to database failed due to" .mysqli_connect_error());
}   

$id = $_GET['id'];
echo $id;
// $i = int($id);
// echo $i;
$sql = "UPDATE register SET STATUS = 'DISABLED' where Sr = $id ";
echo $sql;

$result = mysqli_query($con, $sql);
echo $result; 
if($result)
{
    echo ('<script>alert("Deleted Successfully ");window.location.href = "admin.php";</script>');
    
    // header("location: admin.php");
} 



?>

