<?php
    $host = 'localhost';
    $username = 'dtech';
    $pwd = 'Dtech@2004';
    $dbname = 'parking';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$conn) {
        die ($conn->errorInfo());
        
    } 

   
?>