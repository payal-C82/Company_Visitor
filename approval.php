<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="userrecordsstyle.css">
    <script>
        function sendMessage(action, id) {
            var message = prompt("Enter your message:");
            if (message != null) {
                window.location.href = "update_status.php?action=" + action + "&id=" + id + "&message=" + encodeURIComponent(message);
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <h1 align="center">Visitor Approval</h1>
    </div>
    <center>
    <table border="1" width="88%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Requested User</th>
            <th>Requested No</th>
            <th>Visit Date</th>
            <th>Visitor Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Purpose</th>
            <th>Permission</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM userdashtbl";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['requser']}</td>
                        <td>{$row['reqno']}</td>
                        <td>{$row['visitdt']}</td>
                        <td>{$row['visitorname']}</td>
                        <td>{$row['mobno']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['purpose']}</td>
                        <td>{$row['permission']}</td>
                        <td>
                            <button onclick=\"sendMessage('accept', {$row['id']})\">Accept</button>
                            <button onclick=\"sendMessage('reject', {$row['id']})\">Reject</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br>
    <a href="admindash.php"><img src="backbtn.png"></a>
    </center>
</body>
</html>
