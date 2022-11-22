<?php

$host = "silva.computing.dundee.ac.uk";
$username = "antoinebonfili";
$password = "AC32006";
$database = "antoinebonfilidb";
$mysql = new PDO("mysql:host=".$host.";dbname=".$database,
$username, $password);
?>