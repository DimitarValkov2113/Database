<?php
// Start the session if it has not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../connection.php';
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en-UK">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alpha Watches</title>
</head>


<body>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<?php
$query = "SELECT * FROM watch";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$columns = 0;

if (!$result){
    die("Invalid query: " . $conn->errorCode());
}
?>

<div class="container">
    <div class="row">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Alpha Watches</h1>
            <hr class="my-4">
        </div>
    </div>

<?php
foreach( $result as $row ) {
    if ($columns % 4 == 0){
        echo '<div class="row">';
    }
        ?>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$row["Name"]?></h5>
                    <p class="Text">Price:  <?=$row["Price"]?> ID: <?=$row["ID"]?><br>
                    Lorem ipsum stuff</p>
                    <a class="btn btn-success" href="checkout.php?id=<?=$row['ID']?>">Purchase</a>
                </div>    
            </div>
        </div>

        <?php
    if ($columns % 4 == 3){
        echo '</div>';
    }
    $columns++;
}
?>

</div>

</body>
</html> 