<!DOCTYPE HTML>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

<?php
include 'db.php';
?>

<h1>Manager Home Page</h1>

<div class="container">
    <div class="row">
        <div class="col-3 simple-list-example-scrolls" data-bs-spy="scroll">
            <h2>Staff List</h2>
            <ul class="list-group">
                <?php

                    $query = "SELECT FirstName, LastName FROM Staff" ;
                    $stmt = $mysql->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    foreach($result as $row) {
                        echo "<li class=\"list-group-item\">".$row['FirstName']." ".$row['LastName']."</li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>