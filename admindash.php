<?php
include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<link rel="stylesheet" href="dashstyle.css">
<body>
    <div class="header">
        <h3>VISITOR MANAGEMENT SYSTEM</h3>
    </div>
    <div class="container">
    
        <nav>
            <ul>
                <li>
                    <a href="" class="logo">
                        <img src="adminlogo.png">
                        <span class="nav_item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="admindash.php" class="dashlogo">
                        
                        <img src="dashboardimg1.png">
                        <span class="nav_item">Dashboard</span>
                        </a>
                </li>
                <li>
                    <a href="addusers.php" class="dashlogo">
                        <img src="aboutusimg.png">
                        <span class="nav_item">Add Users</span>
                    </a>
                </li>
                <li>
                    <a href="userrecords.php" class="dashlogo">
                        <img src="reportimg.png">
                        <span class="nav_item">User History</span>
                    </a>
                </li>
                <li>
                    <a href="betweenrecords.php" class="dashlogo">
                        <img src="calenderimg.png">
                        <span class="nav_item">B/W Records</span>
                    </a>
                </li>

                <li>
                    <a href="adminprofile.php" class="dashlogo">
                        <img src="admin.png">
                        <span class="nav_item">Admin Profile</span>
                       
                    </a>
                </li>
                <li>
                    <a href="approval.php" class="dashlogo">
                        <img src="settingimg.png">
                        <span class="nav_item">Approval</span>
                    </a>
                </li>
                
                <li>
                    <a href="login.php" class="dashlogo">
                        <img src="logoutimg.png">
                        <span class="nav_item">Logout</span>
                    </a>
                </li>
            </ul>
            
        </nav>
        
        
        <div class="card">
        <center>
             <h3>Total Visitors</h3><br><br>
             <?php
                  $sql = "SELECT * FROM userdashtbl";
                  $result = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
?>
            
        </center>
            <a href="totalvisitors.php">View Records
            </a>
        
        </div>
        <div class="card1">
        <center>
            <h3>Today's Visitors</h3><br><br>
            <?php
                $sql = "SELECT * FROM userdashtbl WHERE DATE(visitdt) = CURDATE()";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
            
        </center>
            <a href="todayvisitors.php">View Records
            </a>
        

        </div>
        <div class="card2">
        <center>
            <h3>15 day's Visitors</h3><br><br>
            <?php
               $sql = "SELECT * FROM userdashtbl WHERE DATE(visitdt) >= CURDATE() - INTERVAL 15 DAY";
               $result = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($result);
               echo $count;
             ?>
        </center>
             <a href="yesterdayvisitors.php">View Records
            </a>
        

        </div>
        <div class="card3">
        <center>
           <h3>1 Month's Visitors</h3><br><br>
           <?php
                $sql = "SELECT * FROM userdashtbl WHERE DATE(visitdt) >= CURDATE() - INTERVAL 30 DAY";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
            ?>
             </center>
           
            <a href="weekvisitors.php">View Records
            </a>
        

        </div>
        


    </div>
    
</body>
</html>

