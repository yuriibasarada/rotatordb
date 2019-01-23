<?php
require_once ("../../views/parts/connect.php");
if(!empty(@$_POST['id'])) $id = $_POST['id'];

$query = 'SELECT * FROM banners ORDER BY id DESC LIMIT 1';
$result = $pdo->query($query);
$user1 = $result->fetch();
$max = $user1['id'];

if(isset($id) & $id !== $max) {
    $id1 = $id + 1;
    $id2 = 1000;

    $query1 = "UPDATE banners SET id=:id2 WHERE id=:id1";
    $result1 = $pdo->prepare($query1);
    $result1->bindParam(':id2', $id2, PDO::PARAM_INT);
    $result1->bindParam(':id1', $id1, PDO::PARAM_INT);
    $result1->execute();

    $query2 = "UPDATE banners SET id=:id1 WHERE id=:id";
    $result2 = $pdo->prepare($query2);
    $result2->bindParam(':id', $id, PDO::PARAM_INT);
    $result2->bindParam(':id1', $id1, PDO::PARAM_INT);
    $result2->execute();

    $query3 = "UPDATE banners SET id=:id WHERE id=:id2";
    $result3 = $pdo->prepare($query3);
    $result3->bindParam(':id', $id, PDO::PARAM_INT);
    $result3->bindParam(':id2', $id2, PDO::PARAM_INT);
    $result3->execute();

    $query4 = 'SELECT * FROM banners WHERE id = :id';
    $result4 = $pdo->prepare($query4);
    $result4->bindParam(':id', $id1, PDO::PARAM_INT);
    $result4->execute();


    $user = $result4->fetch();
    $user += ['id1' => $user1['id']];
    echo json_encode($user);
}

