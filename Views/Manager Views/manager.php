<html>
    <head>
        <title>Manager</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>

<?php
// Include the database connection
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
                        <a class="nav-link active" aria-current="page" href="manager.php">Home</a>
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
            <div class="col-4">
                <h2>List of branches</h2>
                <a href="manager-branch.php"><button type="button" class="btn btn-primary">Branches Page</button></a>

                <table class="table table-hover table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php

                            $query = "SELECT * FROM Branch" ;
                            $stmt = $mysql->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                        
                            foreach( $result as $row ) {
                                echo "<td>".$row['ID']."</td>";
                                echo "<td>".$row['BranchAddress']."</td></tr>";
                            }
                        ?>
                    </tr></tbody>
                </table>
            </div>
            <div class="col-4">
                <h2>List of staff</h2>
                <a href="manager-staff.php"><button type="button" class="btn btn-primary">Staff Page</button></a>

                <table class="table table-hover table-dark table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                        <?php
                            $query = "SELECT * FROM Staff" ;
                            $stmt = $mysql->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach( $result as $row ) {
                                echo "<td>".$row['FirstName']."</td>";
                                echo "<td>".$row['LastName']."</td>";
                                echo "<td>".$row['ID']."</td></tr>";
                            }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h2>List of suppliers</h2>
                <a href="manager-supplier.php"><button type="button" class="btn btn-primary">Supplier and Parts Page</button></a>

                <table class="table table-hover table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            $query = "SELECT * FROM Supplier" ;
                            $stmt = $mysql->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach( $result as $row ) {
                                echo "<td>".$row['Name']."</td>";
                                echo "<td>".$row['ID']."</td></tr>";
                            }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>