<?php
spl_autoload_register(function($class){
    require_once(__DIR__."\..\models\\$class.php");
});

class BannerController
{
    public function create () {
        if(isset($_POST['submit'])) {
            $name = $_POST['name'] ;
            $url = $_POST['url'];
            $status = $_POST['status'];
            $image =  $_FILES['image']['name'];

            if(isset($_FILES) && $_FILES['image']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
                $destiation_dir = dirname(__DIR__) .'/img/banners/'.$image; // Директория для размещения файла
                move_uploaded_file($_FILES['image']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
            }
            else{
                echo 'No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
            }
            if(Banners::create($name, $image, $url,$status))
                header('Location:/rotator/views/admin/');

        }
        // Подключаем вид
        require_once(__DIR__ . '/../views/admin/create.php');
        return true;
    }
    public function update() {
        $id = $_GET['id'];
        $ban = Banners::get($id);
        if(isset($_POST['submit'])) {
            $name = $_POST['name'] ;
            $url = $_POST['url'];
            $status = $_POST['status'];
            $image =  $_FILES['image']['name'];
            if(isset($_FILES) && $_FILES['image']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
                $destiation_dir = dirname(__DIR__) .'/img/banners/'.$image; // Директория для размещения файла
                move_uploaded_file($_FILES['image']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
            }
            else{
                echo 'No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
            }
            if(Banners::update($name, $image, $url,$id,$status)){
                header('Location:/rotator/views/admin/');
                }
        }
        require_once (__DIR__.'/../views/admin/update.php');
    }
    public function delete() {
        $id = $_GET['id'];
        $ban = Banners::get($id);
        $image = $ban['image'];
        $destiation_dir = dirname(__DIR__) .'/img/banners/'.$image; // Директория для размещения файла
        unlink($destiation_dir);
        if(Banners::delete($id)){
            header('Location:/rotator/views/admin/');
       };
            return require_once('/rotator/views/admin/');
    }
    public static function home(){
        /* This method returns the banner's HTML code */

        $d = Banners::home();
        shuffle($d);
        $bannerGroups = array_chunk($d,4);
        return $bannerGroups;
    }
    public static function tools() {
        $d = Banners::tools();
        return $d;
    }












}
?>