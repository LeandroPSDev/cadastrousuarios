<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastrolivros');

try {
    $conn = new PDO('mysql:host=localhost;dbname=cadastrolivros', USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>