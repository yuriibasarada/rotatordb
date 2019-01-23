<?php
try {
    $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
} catch (PDOException $e) {
    echo "При подключении к базе данных возникла ошибка: " .$e->getMessage();
}
?>
