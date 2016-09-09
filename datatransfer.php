<?php
$servername = "sql7.freemysqlhosting.net";
$username = "sql7134314";
$password = "hWd6tkFykS";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sql7134314", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>