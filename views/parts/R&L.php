<?php require_once("header.php") ?>
<?php require_once(__DIR__ . "/../../Controllers/UserController.php") ?>
<body>
<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif;
?>
<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Зарегистрироваться</a></li>
        <li class="tab"><a href="#login">Авторизоваться</a></li>
    </ul>
    <div class="tab-content">
        <div id="signup">
            <h1>Создать акаунт</h1>
            <form action="" method="post">
                <div class="field-wrap">
                    <label>
                        Login<span class="req">*</span>
                    </label>
                    <input type="text" name="login" required autocomplete="off"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>
                <button type="submit" name="register" class="r button-block"/>Зарегистрироваться</button>
            </form>
        </div>
        <div id="login">
            <h1>Авторизация!</h1>
            <form action="" method="post">
                <div class="field-wrap">
                    <label>
                        Login<span class="req">*</span>
                    </label>
                    <input type="name" required name="login" autocomplete="off"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required name="password" autocomplete="off"/>
                </div>
                <button name="log_in" class="r button-block"/>Войти</button>
            </form>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../../js/index.js"></script>
<?php
require_once(__DIR__ . "/../parts/footer.php");
?>
</body>
</html>
