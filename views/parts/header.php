<!DOCTYPE html>
<html xmlns="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="/rotator/styles.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <script src="../../js/jquery.js"></script>
    <title>Ротатор</title>
</head>
<body>

<div>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <div class="container-fluid f1" style="background-color: #fff">
            <div class="container text-center">
                <div class="row">
                    <div class="col-4">
                        <?php
                        echo " \u{1F649}";
                        ?>
                        <a href="/rotator/views/"><h6>Главная</h6></a>
                    </div>
                    <div class="col-4">
                        <p>Привет, <?php echo $_SESSION['logged_user'][0] ?>!</p>
                        <a href="/rotator/views/admin/"><h6>Мой кабинет</h6></a>
                    </div>
                    <div class="col-4 menu">
                        <?php
                        echo " \u{1F648}";
                        ?>
                        <a href="/rotator/views/links/logout.php"><h6>Выйти</h6></a>
                    </div>
                </div>
            </div>

        </div>


    <?php else : ?>
    <div class="col-12 f3"><a href="links/"><h6>Войти</h6></a><a href="/../links/"></a></div>
</div>

<?php endif; ?>