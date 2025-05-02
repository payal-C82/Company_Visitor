<?php

include("connection.php");

if(isset($_POST['update']))
{
   if(isset($_POST['update'])){
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $contactno = isset($_POST['contactno']) ? $_POST['contactno'] : '';
    $gateallocation = isset($_POST['gateallocation']) ? $_POST['gateallocation'] : '';


    $sql="update registertable set firstname='$firstname',lastname='$lastname',contactno='$contactno',gateallocation='$gateallocation' where role='SuperAdmin'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<h3 align='center' style=color:green;margin-top:8px;>Updated Successfully</h3>";
           
        }
        else

        {
            echo "<h2 align='center' style=color:red;margin-top:8px;>Not Updated </h2>";
        }
    
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<link rel="stylesheet" href="adminprofilestyle.css" type="text/css">
<body>
    <div class="header">
        <h1 align="center">Admin Profile</h1>
    </div>
    
    <center>
        <div class="tbl_body">
            <form action="adminprofile.php" method="post">
    <table border="0" width="40%">
      
    
        <tbody>

        <?php
include("connection.php");
$sql="select * from registertable where role='Admin'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);



if($count!=0)
{
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo "
        <tr>
            <th>ID</th> 
           <td align='center'><input type='text' id='input' readonly value=".$row['id']."></td> 
           </tr>
           <tr>
           <th>Firstname</th> 
           <td align='center'><input type='text' id='input' name='firstname' value=".$row['firstname']."></td> 
           </tr>
           <tr>
           <th>Lastname</th> 
           <td align='center'><input type='text' id='input' name='lastname' value=".$row['lastname']."></td> 
           </tr>
           <tr>
           <th>Email</th> 
           <td align='center'><input type='text' id='input' readonly value=".$row['email']."></td>
           </tr>
           <tr>
           <th>Contact Number</th>
           <td align='center'><input type='text' id='input' name='contactno' value=".$row['contactno']."></td>
           </tr>
           <tr> 
           <th>Role</th> 
           <td align='center'><input type='text' id='input' readonly value=".$row['role']."></td>
           </tr>
           <tr>
           <th>Userid</th>
           <td align='center'><input type='text' id='input' readonly value=".$row['userid']."></td>
           </tr>
           <tr> 
           <th>Gate Allocation</th> 
           <td align='center'><input type='text' id='input' name='gateallocation' value=".$row['gateallocation']."></td> 
           </tr>
           <br>
        ";
    }
}
else{
    
    echo "No records found";
    
}

?>

        </tbody>
   
    </table><br><br>
    <div class="adminbtns">
    <input type="submit" name="update" id="update" value="UPDATE">
    <a href="admindash.php">
            <img src="backbtn.png">
        </a>  
        </div>  
    

    </form> 
</div>
    
        </center>
</body>
</html>

<!--slwa adsq vmcy gzsf-->