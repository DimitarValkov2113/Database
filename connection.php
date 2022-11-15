<?php
function connect() : PDO{
    $host = "silva.computing.dundee.ac.uk";
    $username = "antoinebonfili";
    $password = "AC32006";
    $database = "antoinebonfilidb";

    try {
        $conn = new PDO('mysql:host='. $host .';dbname='. $database, $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        debug_to_console("Connected successfully!");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    return $conn;
}


function close_connection(PDO $connection){
     $connection = null;
}


# Taken from: https://stackoverflow.com/questions/4323411/how-can-i-write-to-the-console-in-php
function debug_to_console($data): void
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
