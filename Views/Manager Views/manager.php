<html>
    <head>
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

<?php
// Include the database connection
include 'db.php';

$query = "SELECT * FROM Branch" ;
$stmt = $mysql->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <h2>List of branches</h2>
            <table class="table table-sm table-bordered border-secondary">
                <thead class="table-dark"><tr>
                    <td>ID</td>
                    <td>Address</td>
                </tr></thead>
                <tbody class="table-group-divider"><tr>
                    <?php
                        foreach( $result as $row ) {
                            echo "<td>".$row['ID']."</td>";
                            echo "<td>".$row['Address']."</td></tr>";
                        }
                    ?>
                </tr></tbody>
            </table>
        </div>
    </div>
</div>

<?php
$query = "SELECT * FROM Staff" ;
$stmt = $mysql->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
?>


<h2>List of staff</h2>
<table class="table table-sm table-bordered border-primary">
    <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Address</td>
        <td>Postcode</td>
        <td>Salary</td>
        <td>Disciplinary</td>
        <td>Sick Leave days</td>
        <td>Role</td>
        <td>Phone</td>
        <td>Email</td>
        <td>Date of Birth</td>    
        <td>Working at branch</td>
    </tr>

    <tr>
        <?php

            foreach( $result as $row ) {
                echo "<td>".$row['ID']."</td>";
                echo "<td>".$row['FirstName']."</td>";
                echo "<td>".$row['LastName']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['Postcode']."</td>";
                echo "<td>".$row['Salary']."</td>";
                echo "<td>".$row['Disciplinary']."</td>";
                echo "<td>".$row['SickLeave']."</td>";
                echo "<td>".$row['Role']."</td>";
                echo "<td>".$row['Phone']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['DateOfBirth']."</td>";
                echo "<td>".$row['BranchID']."</td>";
            }
        ?>
    </tr>
</table>

</html>