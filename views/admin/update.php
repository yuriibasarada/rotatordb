<?php
session_start();
require_once(__DIR__ . "/../parts/header.php");
?>
<body>
<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="" style="float: none;width: 100%;">Редактирование баннера</a></li>
    </ul>
    <div class="tab-content">
        <h1>Изминяйте!</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="field-wrap">
                <input type="text" name="name" value="<?php echo $ban['name']; ?>" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
                <input type="text" name="url" value="<?php echo $ban['url']; ?>" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
                <select name="status" id="">
                    <option value="Активный">Активный</option>
                    <option value="Неактивный">Неактивный</option>
                </select><br/>
            </div>
            <div class="field-wrap">
                <input type="file" name="image"><br/><br/>
            </div>
            <button type="submit" name="submit" class="r button-block"/>
            Сохранить</button>
        </form>
    </div>
</div>
<?php
require_once(__DIR__ . "/../parts/footer.php");
?>
</body>
</html>
