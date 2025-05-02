<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Records</title>
    <link rel="stylesheet" href="betweenrecstyle.css">
</head>
<body>
    <center>
    <section class="part">
        <div class="header">
            <h2>Search Records</h2>
        </div>
        <div class="card_body">
            <form action="" method="post">
                <div class="form_group">
                    <label for="">From Date :</label>
                    <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){echo $_POST['from_date'];} ?>" class="form_control">

                    <label for="">To Date : </label>
                    <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){echo $_POST['to_date'];} ?>" class="form_control">

                    <label for="">Check</label>
                    <button type="submit" class="btn">Filter User</button>

                    <input type="text" placeholder="Search data" name="search">
                    <button class="btn2" name="submit">Search</button>
                </div>
            </form>

            <div class="card_tbl">
                <div class="card_body">
                    <h3>User List</h3>
                    <hr>
                    <table border="1" width="72%">
                        <thead>
                            <tr>
                                <th width="8%">ID</th> 
                                <th width="8%">Requested User</th> 
                                <th width="8%">Requested No</th> 
                                <th width="8%">Visit Date</th> 
                                <th width="8%">Visitor Name</th>
                                <th width="8%">Mobile No</th> 
                                <th width="8%">Email</th> 
                                <th width="8%">Purpose</th>  
                                <th width="8%" colspan="4">Operations</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("connection.php");

                            // Search filter
                            if(isset($_POST['submit'])) {
                                $search = $_POST['search'];
                                $sql = "SELECT * FROM userdashtbl 
                                        WHERE id LIKE '%$search%' 
                                           OR requser LIKE '%$search%' 
                                           OR reqno LIKE '%$search%' 
                                           OR visitorname LIKE '%$search%' 
                                           OR mobno LIKE '%$search%'";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "
                                            <tr>
                                                <td>{$row['id']}</td> 
                                                <td>{$row['requser']}</td> 
                                                <td>{$row['reqno']}</td> 
                                                <td>{$row['visitdt']}</td>
                                                <td>{$row['visitorname']}</td> 
                                                <td>{$row['mobno']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['purpose']}</td> 
                                                <td><a href='view.php?rn={$row['id']}'><img src='viewimg.png'></a></td>
                                                <td><a href='update1.php?rn={$row['id']}&reu={$row['requser']}&ren={$row['reqno']}&vdt={$row['visitdt']}&vn={$row['visitorname']}&mn={$row['mobno']}&em={$row['email']}'><img src='updateimg.png'></a></td> 
                                                <td><a href='pdfdownload1.php?rn={$row['id']}&ACTION=DOWNLOAD'><img src='pdfdownloadimg.png'></a></td>
                                                <td><a href='delete1.php?rn={$row['id']}' onclick='return checkdelete()'><img src='deleteimg.png'></a></td>
                                            </tr>";
                                        }
                                    } else {
                                        echo '<tr><td colspan="12"><h5>Data not found</h5></td></tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="12"><h5>Error in query: ' . mysqli_error($conn) . '</h5></td></tr>';
                                }
                            }

                            // Between dates filter
                            if(isset($_POST['from_date']) && isset($_POST['to_date'])) {
                                if(strtotime($_POST['from_date']) < strtotime($_POST['to_date'])) {
                                    $from_date = $_POST['from_date'];
                                    $to_date = $_POST['to_date'];

                                    // Make sure this matches your DB column name
                                    $sql = "SELECT * FROM userdashtbl WHERE visitdt BETWEEN '$from_date' AND '$to_date'";
                                    $result = mysqli_query($conn, $sql);

                                    if($result) {
                                        $count = mysqli_num_rows($result);
                                        if($count > 0) {
                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo "
                                                <tr>
                                                    <td>{$row['id']}</td> 
                                                    <td>{$row['requser']}</td> 
                                                    <td>{$row['reqno']}</td> 
                                                    <td>{$row['visitdt']}</td>
                                                    <td>{$row['visitorname']}</td> 
                                                    <td>{$row['mobno']}</td>
                                                    <td>{$row['email']}</td>
                                                    <td>{$row['purpose']}</td> 
                                                    <td><a href='view.php?rn={$row['id']}'><img src='viewimg.png'></a></td>
                                                    <td><a href='update1.php?rn={$row['id']}&reu={$row['requser']}&ren={$row['reqno']}&vdt={$row['visitdt']}&vn={$row['visitorname']}&mn={$row['mobno']}&em={$row['email']}'><img src='updateimg.png'></a></td> 
                                                    <td><a href='pdfdownload1.php?rn={$row['id']}&ACTION=DOWNLOAD'><img src='pdfdownloadimg.png'></a></td>
                                                    <td><a href='delete1.php?rn={$row['id']}' onclick='return checkdelete()'><img src='deleteimg.png'></a></td>
                                                </tr>";
                                            }
                                        } else {
                                            echo '<tr><td colspan="12"><h5>No record found</h5></td></tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="12"><h5>Query Error: ' . mysqli_error($conn) . '</h5></td></tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="12"><h5>From date is greater than To date. Please change & Filter</h5></td></tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table><br>
                    <a href="admindash.php"><img src="backbtn.png"></a>
                </div>
            </div>
        </div>
    </section>   
    </center> 
</body>
</html>
