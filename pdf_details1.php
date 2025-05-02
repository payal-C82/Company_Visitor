
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download PDF</title>
</head>


<body>
    <center>
        <div class="header">
            <h2 style=color:blue;text-transform:uppercase>Details</h2>
        </div>
    <table border="1" align="center" width="100%">
        <tbody>
        <tr>
            <th>ID</th>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <th>Requested User</th>
            <td><?=$row['requser']?></td>
        </tr>

       
        <tr>
            <th>Requested No</th>
            <td><?=$row['reqno']?></td>
        </tr>
        <tr>
            <th>Visit Date</th>
            <td><?=$row['visitdt']?></td>
        </tr>
        <tr>
            <th>Visitor Pass No</th>
            <td><?=$row['passno']?></td>
        </tr>
        <tr>
            <th>Arrival Date</th>
            <td><?=$row['arrivaldt']?></td>
        </tr>
        <tr>
            <th>Visitor Name</th>
            <td><?=$row['visitorname']?></td>
        </tr>
        <tr>
            <th>Aadhar No</th>
            <td><?=$row['aadharno']?></td>
        </tr>
        <tr>
            <th>Additional Person</th>
            <td><?=$row['Addperson']?></td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td><?=$row['mobno']?></td>
        </tr>
        <tr>
            <th>Alternate Mobile Number</th>
            <td><?=$row['altmobno']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$row['email']?></td>
        </tr>
        <tr>
            <th>Representing Company</th>
            <td><?=$row['repcompany']?></td>
        </tr>
        <tr>
            <th>Pincode</th>
            <td><?=$row['pincode']?></td>
        </tr>
    
        <tr>
            <th>Address</th>
            <td><?=$row['address']?></td>
        </tr>
        <tr>
            <th>Cityr</th>
            <td><?=$row['city']?></td>
        </tr>
        <tr>
            <th>State</th>
            <td><?=$row['state']?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?=$row['country']?></td>
        </tr>
        <tr>
            <th>Material Allowed</th>
            <td><?=$row['material']?></td>
        </tr>
        <tr>
            <th>Purpose of visit</th>
            <td><?=$row['purpose']?></td>
        </tr>
        <tr>
            <th>Note about Arrival Dates</th>
            <td><?=$row['dates']?></td>
        </tr>
        <tr>
            <th>Remark</th>
            <td><?=$row['remark']?></td>
        </tr>
          
    
        
       
    
        </tbody>
    </table>
</center>
</body>
</html>
