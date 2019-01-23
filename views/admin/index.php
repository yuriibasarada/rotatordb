<?php
session_start();
require_once(__DIR__ . "/../parts/header.php");
require "../../Controllers/BannerController.php";
?>
<div class="container-fluid f2">
    <div class="container text-center">
        <button onclick="location.href ='../links/create.php'" type="submit" class="r r1">
            <i class="fas fa-plus-circle" style=" padding-right:10px;"> </i>Создать Баннер
        </button>
        <div class="row admin text-center">
            <div class="col-3">Фотографи</div>
            <div class="col-2">Имя</div>
            <div class="col-2">URL</div>
            <div class="col-2">Статус</div>
            <div class="col-1">Номер в списке</div>
            <div class="col-2">Изменить</div>
        </div>
        <div class="rows">
            <!-- Two groups of banners -->
            <?php
            $banners = BannerController::tools();

            // Looping through the first group:
            foreach ($banners as $ban) {
                echo '<div class="row admin a1 text-center">';
                echo '<div class="col-3"><img src="../../img/banners/' . $ban['image'] . '" alt="' . $ban['name'] . '" width="125" height="125" /></div>';
                echo '<div class="col-2">' . $ban['name'] . '</div>';
                echo '<div class="col-2"><a href="">' . $ban['url'] . '</a></div>';
                echo '<div class="col-2">' . $ban['status'] . '</div>';
                echo '<div class="col-1" id="' . $ban['id'] . '">' . $ban['id'] . '</div>';
                echo '<div class="col-2" style="padding-top: 10px">
                    <button type="button" value="up" class="up-button" id="' . $ban['id'] . '"><i class="fas fa-angle-double-up fa-2x"></i></button><br/>
                    <a href="../links/update.php?id=' . $ban['id'] . '"><i class="fas fa-edit fa-2x"></i>
                    </a><a href="../links/delete.php?id=' . $ban['id'] . '" onclick="var result = confirm(\'Вы действительно хотите удалить банер?\'); if(!result) return false;"><i class="far fa-trash-alt fa-2x"></i></a><br/>
                    <button type="button" value="down" class="down-button" id="' . $ban['id'] . '" ><i class="fas fa-angle-double-down fa-2x"></i></button>             
                    </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script src="../../js/tool.js"></script>
</div>
<?php
require_once(__DIR__ . "/../parts/footer.php");
?>
</body>
</html>