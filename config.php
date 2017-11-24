<?php

    $hostname="localhost";
    $username="root";
    $password="joeburton";
    $dbname="dev";

    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>