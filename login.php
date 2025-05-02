<?php
include("connection.php");
//if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['submit'])){
    $userid =$_POST['userid'];
    $password=$_POST['password'];


    
    $sql="select * from registertable where userid='$userid'";
    $result=mysqli_query($conn,$sql);
    //$row=mysqli_fetch_array($result);
    //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    

    if($count==1)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        if(password_verify($password,$row['password']))
        {
      
        $sql="insert into logintable(userid,password)values('$userid','$password')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
          if($row["role"]=="Admin")
        {
          header("location:admindash.php");
        }
        elseif($row["role"]=="User")
        {
          header("location:userdash.php");
        }
      }
      }
    }
      
   }
    else{
      
      //echo "login failed. Invalid email and password";
        echo `<script>
          window.location.href="login.php";
          alert("login failed. Invalid email and password")
          </script>`;
         /* if(isset($_POST['userid']) && isset($_POST['password'])){
            function validate($data){
              $data=trim($data);
              $data=stripslashes($data);
              $data=htmlspecialchars($data);
              return($data);
            }
            $userid=validate($_POST['userid']);
            $password=validate($_POST['password']);


          if(empty($userid)){
            
            ?>
            <div class="error"><?php
            alert("userid is required");
            ?>
            </div>
            <?php
          
           // header("Location:login.php?error=userid is required");
            exit();
          }
          if(empty($password)){
            header("Location:login.php?error=userid is required");
          }
     }
     */
    }
 }

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
<title>Login Page
</title>
</head>
<link rel="stylesheet" type="text/css" href="style1.css">
<body>
    <center>
    <div id="form">
        <h1>Login</h1>
        <form type="form" action="login.php" method="post">

        
            
                <input type="text" id="input" name="userid" placeholder="Userid"><br><br>

                <input type="password" id="input" name="password" placeholder="Password"><br><br>

                
            <br>
                
            <div class="bottom">
                <div class="left">
                    <input type="checkbox" id="check">
                    <label for="cbox">Remember Me</label>

                </div>
                <div class="right">
                    <label><a href="recover_psw.php">Forgot Password?</a></label>

                </div>

            </div><br>
                   <input type="submit" name="submit" id="btn" value="Login"><br><br>
                   <label>Don't have an account?<a href="registration.php">Register</a></label>


                    
        

        </form>
        </center>
    </div>
</body>
</html>




