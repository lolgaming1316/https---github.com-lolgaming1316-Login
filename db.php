<?php
// db.php
try {
    $dbhost = 'localhost';
    $dbname = 'login';
    $dbuser = 'root';
    $dbpass = 'admin';
    $connect = new PDO(
        "mysql:host=$dbhost;dbname=$dbname",
        $dbuser,
        $dbpass 
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
