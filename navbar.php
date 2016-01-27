<?php include 'config.php';?>
<div class="row" id="navebar">
    <nav class="navbar navbar-inverse navbar-fixed-top ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Asre Mjazi</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--site logo-->
            <div class="navbar-brand">
                <a id="logo" href="asremajazi.com">
                    <img alt="Brand" src="img/asr1.png"><span>عصرمجازی</span>
                </a>
            </div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><span></span><a href="articlePageUi.php">صفحه اصلی</a> </li>
                <?php
                $grp2 = mysql_query("select * from `grp` where `mgrp`=0 ");
                while ($grp = mysql_fetch_array($grp2)) {
                    $catId = $grp['id'];
                    ?>
                    <li><span></span><a href="#<?php echo $grp['id'] ?>" >
                            &nbsp; <?php echo $grp['name'] ?></a></li>
                <?php } ?>
                <li><a href="#" class="fa fa-search fa-1x">&nbsp;<input type="text" required class="input-sm"> </a></li>
            </ul>
        </div>
    </nav>
</div>