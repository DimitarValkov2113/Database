<!DOCTYPE HTML>
<html>
    <head>
        <title>Manager Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    </head>

<?php
include 'db.php';
?>

<body id="main">
    <div class="container" id="navbar">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><h4>Alpha</h4></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="manager.php">Home</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Staff
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="manager-staff.php">Staff page</a></li>
                            <li><a class="dropdown-item" href="edit-staff.php">Edit staff</a></li>
                        </ul>
                    </li>
                    <a class="nav-link" href="manager-supplier.php">Suppliers</a>
                    <a class="nav-link" href="manager-branch.php">Branches</a>
                </div>
                </div>
            </div>
        </nav>
    </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col simple-list-example-scrolls" data-bs-spy="scroll">
                <h2>Staff List</h2>
                <ul class="list-group">
                        <table class="table table-hover table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>Salary</th>
                                    <th>Disciplinary</th>
                                    <th>Sick Leave days</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>    
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                    $query = "SELECT s.*, b.BranchAddress FROM antoinebonfilidb.Staff s, antoinebonfilidb.Branch b WHERE s.BranchID=b.ID" ;
                                    $stmt = $mysql->prepare($query);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach($result as $row) {
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
                                        echo "<td>".$row['BranchAddress']."</td></tr>";
                                    }  
                                ?>
                        </tbody>
                    </table>
                <a href="edit-staff.php"><button type="button" class="btn btn-primary" target=”_blank”>Edit Staff</button></a>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>