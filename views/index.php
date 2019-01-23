<?php
session_start();
require_once "parts/header.php";
require "../Controllers/BannerController.php";
?>
<html>
<body>
<div id="main" class="container">
    <!-- Two groups of banners -->
    <div class="row" style="flex-wrap: nowrap;">
    <div class="col-6 bannerHolder">
        <?php
        $bannerGroups = BannerController::home();
        // Looping through the first group:
        foreach($bannerGroups[0] as $ban)
        {
            $ban['name'] = htmlspecialchars($ban['name']);
            echo '<div class="banner">
				<a href="'.$ban['url'].'">
					<img src="/rotator/img/banners/'.$ban['image'].'" alt="'.$ban['name'].'" width="125" height="125" />
				</a>
				<p class="companyInfo">Посетить '.$ban['name'].'</p>
				<div class="cornerTL"></div>
				<div class="cornerTR"></div>
				<div class="cornerBL"></div>
				<div class="cornerBR"></div>
			</div>';
        }

        ?>
    </div>

    <div class="col-6 bannerHolder">
        <?php

        // Looping through the second group:

        foreach($bannerGroups[1] as $ban)
        {
            $ban['name'] = htmlspecialchars($ban['name']);
            echo '<div class="banner">
				<a href="'.$ban['url'].'">
					<img src="/rotator/img/banners/'.$ban['image'].'" alt="'.$ban['name'].'" width="125" height="125" />
				</a>
				<p class="companyInfo">Посетить '.$ban['name'].'</p>
				<div class="cornerTL"></div>
				<div class="cornerTR"></div>
				<div class="cornerBL"></div>
				<div class="cornerBR"></div>
			</div>';
        }

        ?>
    </div>
</div>


</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<?php
require_once(__DIR__ . "/parts/footer.php");
?>
</body>
</html>
