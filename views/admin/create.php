<?php
session_start();
require_once(__DIR__ . "/../parts/header.php");
?>
<body>
<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="" style="float: none;width: 100%;">Создание баннера</a></li>
    </ul>
    <div class="tab-content">
        <h1>Создавайте!</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="field-wrap">
                <label>
                    Название<span class="req">*</span>
                </label>
                <input type="text" name="name" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
                <label>
                    Url<span class="req">*</span>
                </label>
                <input type="text" name="url" required autocomplete="off"/>
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
            Создать</button>
        </form>
    </div>
</div>
<script src="../../js/index.js"></script>
<?php
require_once(__DIR__ . "/../parts/footer.php");
?>
</body>
</html>

