<?php

class Banners {



    public function create ($name, $image, $url, $status){

        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query1 = 'SELECT * FROM banners ORDER BY id DESC LIMIT 1';
        $result1 = $pdo->query($query1);
        $user = $result1->fetch();
        $id = $user['id']+1;
        $query = 'INSERT INTO banners (name, image, url, status, id) VALUES (:name, :image, :url, :status, :id)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $pdo->prepare($query);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public function update ($name, $image,$url, $id, $status) {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = "UPDATE banners SET name=:name,image=:image,url=:url, status=:status WHERE id=:id";
        $result = $pdo->prepare($query);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }
    public function delete($id) {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');


        $query = "DELETE FROM banners WHERE id = :id";
        $result = $pdo->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();


    }
    public function get($id) {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = 'SELECT * FROM banners WHERE id = :id';
        $result = $pdo->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $ban = $result->fetch();
        return($ban);
    }
    public static function  home() {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $bannerResult = $pdo->query("SELECT * FROM banners WHERE status = \"Активный\";");
        $row = $bannerResult->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public  static  function tools() {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $bannerResult = $pdo->query("SELECT * FROM banners ORDER BY id");
        $row = $bannerResult->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}

?>