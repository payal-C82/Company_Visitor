<?php
$conn=new mysqli("localhost","root","","registrationdb1",3306);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
echo "";
?>

