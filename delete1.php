<?php
include("connection.php");

$id=$_GET['rn'];
$sql="delete from registertable where id='$id'";

$result=mysqli_query($conn,$sql);

if($result)
{
    
    echo "<h3 align='center' srtyle=color:green>deleted</h3>";
    
}   
else
{

    echo "<h3 align='center' srtyle=red:green>not deleted</h3>";
}
?>