<?php session_start();

// store session data
if(isset($_SESSION['views'])){
    $_SESSION['views'] = $_SESSION['views'] + 1;
}
else{
    $_SESSION['views'] = 1;
}

// display the session variable
echo "The number of views is ".$_SESSION['views'];

?>

<?php
// Include the database connection
include 'db.php';

$query = "SELECT * FROM Branch" ;
$stmt = $mysql->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
?>

<h1>List of branches</h1>
<table>
    <thead>
    <td><h4>ID</h4></td>
    <td><h4>Address</h4></td>
</thead>
<tbody>

<?php

foreach( $result as $row ) {
    echo "<td>".$row['ID']."</td>";
    echo "<td>".$row['Address']."</td></tr>";
}
?>

</thead>
</table>