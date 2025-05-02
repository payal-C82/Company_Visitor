<?php
include("connection.php");

$firstnameErr = $lastnameErr = $emailErr = $contactnoErr = $roleErr = $useridErr = $passwordErr = $cpassErr = $gateallocationErr = "";
$firstname = $lastname = $email = $contactno = $role = $userid = $password = $cpass = $gateallocation = "";


//compare the method
$flag=true;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //Empty Error

    if(empty($_POST['firstname']))
    {
        $firstnameErr = "First name is Required";
        $flag=false;
    }
    else
    {
        $firstname = input_data($_POST['firstname']);
        if(!preg_match("/^[a-zA-Z]*$/",$firstname))
        {
            $firstnameErr = "Only alphabets and white space are allowed";
        }
        
    }

    if(empty($_POST['lastname']))
    {
        $lastnameErr = "Last name is Required";
        $flag=false;
    }
    else
    {
        $lastname = input_data($_POST['lastname']);
        if(!preg_match("/^[a-zA-Z]*$/",$lastname))
        {
            $lastnameErr = "Only alphabets and white space are allowed";
        }
        
    }

    if(empty($_POST['email']))
    {
        $emailErr = "Email is Required";
        $flag=false;
    }
    else
    {
        $email = input_data($_POST['email']);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
        
    }


    if(empty($_POST['contactno']))
    {
        $contactnoErr = "Mobile Number is Required";
        $flag=false;
    }
    else
    {
        $contactno = input_data($_POST['contactno']);
        if(!preg_match("/^[0-9]*$/",$contactno))
        {
            $contactnoErr = "Only numeric value is allowed";
        }
        if(strlen($contactno)!=10)
        {
            $contactnoErr = "Mobile no must contains 10 digits";
        }
        
    }

    if(empty($_POST['role']))
    {
        $roleErr = "Role is Required";
        $flag=false;
    }
    else
    {
        $role = input_data($_POST['role']);
        
    }

    if(empty($_POST['userid']))
    {
        $useridErr = " User ID is Required";
        $flag=false;
    }
    else
    {
        $userid = input_data($_POST['userid']);
        
    }

    if(empty($_POST['password']))
    {
        $passwordErr = "Password is Required";
        $flag=false;
    }
    else
    {
        $password = input_data($_POST['password']);
        if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/",$password))
        {
            $passwordErr = "Invalid password";
        }
        if(strlen($password)>8)
        {
            $password = input_data($_POST['password']);
            
        }
        else{
            $passwordErr = "Password must contains 8 digits";
        }
        
    }

    
    if(empty($_POST['cpass']))
    {
        $cpassErr = " Confirm Password is Required";
        $flag=false;
    }
    else
    {
       
        $cpass = input_data($_POST['cpass']);
        if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/",$cpass))
        {
            $cpassErr = "Invalid password";
        }
        if(strlen($cpass)>8)
        {
            $cpass = input_data($_POST['cpass']);
        }
        else{
            $cpassErr = "Password must contains 8 digits";
        }
        
    }

    
    if($password!=$cpass)
    {
        $cpassErr="Password and confirm password do not match";
        $flag=false;
    
    }
    

    if(empty($_POST['gateallocation']))
    {
        $gateallocationErr = "gateallocation is Required";
        $flag=false;
    }
    else
    {
        $gateallocation = input_data($_POST['gateallocation']);
        
    }

}


function input_data($data)
{
    //remove spaces clashes special symbols

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($flag)
{
if(isset($_POST['submit'])){
    
   
    if($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $contactnoErr == "" && $roleErr == "" && $useridErr == "" && $passwordErr == "" && $cpassErr == "" && $gateallocationErr == "")
    {
       if($password==$cpass)
       {
        //$password=md5($_POST['password']);
        //$cpass=md5($_POST['cpass']);
        //$password=password_hash($password,PASSWORD_DEFAULT);
        //$cpass=password_hash($cpass,PASSWORD_DEFAULT);

    
            $sql="insert into registertable(firstname,lastname,email,contactno,role,userid,password,gateallocation)values('$firstname','$lastname','$email','$contactno','$role','$userid','$password','$gateallocation')";
            $result=mysqli_query($conn,$sql);
            if($result){
                
                echo "<h2 <h2 align='center' style=color:pink;margin-top:15px;>user add successfully</h2>";
                
               

            }
            else
    
            {
                echo "<h2 align='center' style=color:red;margin-top:8px;>Not Saved </h2>";
            }
        }
    }
}
    
}

    ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>

        </title>
    </head>
    <link rel="stylesheet" type="text/css" href="adduserstyle.css">
    
    <body>
     <center>
        <div id="form">
        <h1 id="reg">ADD USERS</h1>
            <form type="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
                <table>
                <tr>
                        <td><label for="userid">User ID :</label></td>
                        <td><input type="text" id="input" name="userid" value="<?= $userid;?>">
                        <span class="error"><?= $useridErr;?></span></td>
                    </tr>
                    <tr>
                        <td><label for="firstname">First name :</label></td>
                        <td><input type="text" id="input" name="firstname" value="<?= $firstname;?>">
                        <span class="error"><?= $firstnameErr;?></span></td>
                    </tr>

                    <tr>
                        <td><label for="lastname">Last name :</label></td>
                        <td><input type="text" id="input" name="lastname" value="<?= $lastname;?>">
                        <span class="error"><?= $lastnameErr;?></span></td>
                    </tr>

                    <tr>
                        <td><label for="email">Email :</label></td>
                        <td><input type="text" id="input" name="email" value="<?= $email;?>">
                        <span class="error"><?= $emailErr;?></span></td>
                    </tr>

                    <tr>
                        <td><label for="contactno">Contact Number :</label></td>
                        <td><input type="text" id="input" name="contactno" value="<?= $contactno;?>">
                        <span class="error"><?= $contactnoErr;?></span></td>
                    </tr>
                    <tr>
                        <td><label for="role">Role :</label></td>
                        <td><select name="role" id="input" value="<?= $role;?>">
                            <option value=""></option>
                            <option value="SuperAdmin">SuperAdmin</option>
                            <option value="Admin">Admin</option>
                            <option value="User" selected>User</option>
                        </select>
                        <span class="error"><?= $roleErr;?></span></td>
                    </tr>
                    

                    <tr>
                        <td><label for="password">Password :</label></td>
                        <td><input type="password" id="input" name="password" value="<?= $password;?>">
                        <span class="error"><?= $passwordErr;?></span></td>
                    </tr>

                    <tr>
                        <td><label for="cpass">Confirm Password :</label></td>
                        <td><input type="password" id="input" name="cpass" value="<?= $cpass;?>">
                        <span class="error"><?= $cpassErr;?></span></td>
                    </tr>

                    <tr>
                        <td><label for="gateallocation">Gate Allocation :</label></td>
                        <td><select name="gateallocation" id="input" value="<?= $gateallocation;?>">
                            <option value=""></option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                        </select>
                        <span class="error"><?= $gateallocationErr;?></span></td>
                    </tr>
                </table><br>
                <input type="submit" id="submit" name="submit" value="SUBMIT">
                <a href="admindash.php">
                    <img src="backbtn.png">
                </a>
                
                

            </form>
            
     </center>
        </div>  
    </body>
</html>


