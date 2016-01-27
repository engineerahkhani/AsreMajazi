<?php include 'config.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>عصرمجازی | مقالات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="<?php
    echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    ?>"/>
    <meta name="keywords" content="<?php
    echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    ?>"/>
    <link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<!--navigation goes here-->
<?php require 'navbar.php'; ?>
<!--end navigation-->
<!--head end-->
<div class="container marginTop">
    <!--article section-->
    <div id="articleSection">
        <div class="row ">
            <!--end searchBarSection-->
<div class="col-sm-1"></div>
            <div class="col-xs-12 col-md-6">
                <div id="slideShowSection" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#slideShowSection" data-slide-to="0" class="active"></li>
                        <li data-target="#slideShowSection" data-slide-to="1"></li>
                        <li data-target="#slideShowSection" data-slide-to="2"></li>
                        <li data-target="#slideShowSection" data-slide-to="3"></li>
                        <li data-target="#slideShowSection" data-slide-to="4"></li>
                        <li data-target="#slideShowSection" data-slide-to="5"></li>
                        <li data-target="#slideShowSection" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $grp2 = mysql_query("select * from article ORDER BY date and time  LIMIT 7 ");
                        $i = 1;
                        while ($grp = mysql_fetch_array($grp2)) {
                            $id = $grp['id'];
                            if ($i == 1) {
                                echo "  <div class=\"item active \">";
                            } else {
                                echo "  <div class=\"item  \">";
                            }
                            ++$i;
                            $doc = new DOMDocument();
                            $doc->loadHTML($grp['content']);
                            $xml = simplexml_import_dom($doc);
                            $images = $xml->xpath('//img');
                            $count = count($images);
                            if ($count != 0) {
                                $src = $images[0]['src'];
                            } else {
                                $src = 'img/blankpic.jpg';
                            }
                            echo "<img class=\"art-thumb\" src=\"" . $src . "\" />";
                            echo '</a>';
                            echo " <div class=\" active\">";
                            echo "<div class=\"carousel-caption\">";
                            echo "<h2><a href=\"detailes.php?id=" . $id . "\"  class=\"carousel-caption-title\" target=_blank>";
                            echo $grp['title'];
                            echo "</a></h2>
                            </div>
                        </div>
                    </div>";
                        }
                        ?>
                    </div>
                    <a class="left carousel-control" href="#slideShowSection" data-slide="prev"><span
                            class="fa fa-chevron-circle-left fa-2x"></span></a>
                    <a class="right carousel-control" href="#slideShowSection" data-slide="next"><span
                            class="fa fa-chevron-circle-right fa-2x"></span></a>
                </div>
                <!--                end slideShowSection-->
            </div>
            <div class="col-xs-12 col-md-4 ">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#topArticles">جدیدترین</a></li>
                    <li><a data-toggle="tab" href="#recentArticles">پربازدیدترین</a></li>
                </ul>
                <div class="tab-content">
                    <div id="topArticles" class="tab-pane fade in active">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ol>
                                    <?php
                                    $grp2 = mysql_query("select * from article  ORDER BY view DESC LIMIT 5 ");
                                    while ($grp = mysql_fetch_array($grp2)) {
                                        $id = $grp['id'];
                                        echo "<a href=\"detailes.php?id=" . $id . "\" target=\"_blank\"> <li>" . $grp['title'] . "</li></a>";
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="recentArticles" class="tab-pane fade in dirRtl">
                        <div class="panel panel-default">
                           <div class="panel-body">
                                <ol>
                                    <?php
                                    $grp2 = mysql_query("select * from article  ORDER BY date DESC LIMIT 5 ");
                                    while ($grp = mysql_fetch_array($grp2)) {
                                        $id = $grp['id'];
                                        echo "<a href=\"detailes.php?id=" . $id . "\" target=\"_blank\"> <li>" . $grp['title'] . "</li></a>";
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-1"></div>

        </div>
    </div>
</div>
<!-- end article section-->

<section id="mainSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 "></div>
            <div class="col-sm-10 ">
                <div id="articles">
                    <section id="categorySection">
                        <?php
                        $p = 6;
                        $grp2 = mysql_query("select * from `grp` where `mgrp`=0 ");
                        while ($grp = mysql_fetch_array($grp2)) {
                            $catId = $grp['id'];
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"
                                     id="<?php echo $grp['id'] ?>"><h5 ><?php echo $grp['name'] ?> </h5></div>
                                <div class="panel-body">
                                    <?php
                                    $j = 0;
                                    $article = mysql_query("select * from article where grp = $catId ORDER BY date DESC LIMIT 7");
                                    while ($articleDetail = mysql_fetch_array($article)) {
                                        $id = $articleDetail['id'];

                                        if ($j == 0) {
                                            ?>
                                            <div class="row" id="rowActive">
                                                <div class="active">
                                                    <div class="media" id="margin-right5">
                                                        <div class="media-right">
                                                            <a href="#">
                                                                <?php $doc = new DOMDocument();
                                                                $doc->loadHTML($articleDetail['content']);
                                                                $xml = simplexml_import_dom($doc);
                                                                $images = $xml->xpath('//img');
                                                                $count = count($images);
                                                                $id = $articleDetail['id'];
                                                                if ($count != 0) {
                                                                    $src = $images[0]['src'];
                                                                } else {
                                                                    $src = 'img/blankpic.jpg';
                                                                }
                                                                ?>
                                                                <img  class="media-object img-responsive" src="<?php echo $src ?>">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><?php echo limitword($articleDetail['title'], 8); ?></h4>
                                                            <p class="text-justify">
                                                                <?php echo limitword($articleDetail['sum'],80); ?><br>
                                                                <a class="readMore" target="_blank" href="detailes.php?id=<?php echo $articleDetail['id']; ?>" >بیشتر بخوانید...</a>
                                                            </p>
                                                            <div  class=" dirRtl btn-group btn-group-justified " role="group" aria-label="...">
                                                                <span class="label label-danger "><span><span class="fa fa fa-user-md"></span> <?php echo"احمد حسین خانی" ;?></span>&nbsp;</span>
                                                                <span class="label label-danger "><span><span class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($articleDetail['date']); ?></span>&nbsp;</span>
                                                                <span class="label label-danger "><span><span class="fa fa fa-eye"></span> <?php echo ($articleDetail['view']); ?></span>&nbsp;</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                                        } else {
                                            if ($p == 6) {
                                                ?>
                                                <div class="row" >
                                                <div class="inactive" id="margin-right5">
                                            <?php } ?>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="row" id="margin-right5" >
                                                    <div class="media" >
                                                        <div class="media-right"  >
                                                            <a href="#">
                                                                <?php $doc = new DOMDocument();
                                                                $doc->loadHTML($articleDetail['content']);
                                                                $xml = simplexml_import_dom($doc);
                                                                $images = $xml->xpath('//img');
                                                                $count = count($images);
                                                                $id = $articleDetail['id'];
                                                                if ($count != 0) {
                                                                    $src = $images[0]['src'];
                                                                } else {
                                                                    $src = 'img/blankpic.jpg';
                                                                }
                                                                ?>
                                                                <img width="120" height="64" class="media-object" src="<?php echo $src ?>" >
                                                            </a>
                                                        </div>
                                                        <div class="media-body" >
                                                            <h6 class="media-heading"><?php --$p; echo limitword($articleDetail['title'], 8); ?></h6>
                                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                                <span class="label label-danger ">Left</span>
                                                                <span  class="label label-danger ">Middle</span>
                                                                <span  class="label label-danger ">Right</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($p == 0) { ?>

                                                </div>
                                                </div>
                                            <?php }
                                        }
                                        $j = 1;
                                    } ?>
                                </div><!--pandel body end -->
                                <div class="panel-footer "><a class="readMore" href="loadMore.php?id=<?php echo $grp['id'] ?>"
                                                             target="_blank">مشاهده عناوین بیشتر...</a></div>
                            </div><!-- panel end -->
                        <?php } ?>
                    </section>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</section>

<!--end mainSection-->
<!--footer section-->
<?php require 'footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>
<script>
    $(function () {
        $('.carousel').carousel({
            interval: 4000
        });
    });
</script>
<script>
    $(document).ready(function () {
      $(".navbar-nav li input").css("display", "none");
        $(".navbar-nav .fa-search").click(function () {
            $(".navbar-nav li input").slideDown();
            $('.navbar-nav li input').keydown(function (event) {
                if (event.keyCode == '13') {
                    var serchItem = $(this).val();
                    if(empty(serchItem))
                    {
                        alert("برای شروع جستجو کلمه مورد نظر را در فیلد وارد نمایید.");
                    }else
                    {
                    window.location.replace("search.php?key=" + serchItem);
                    $('#mainSection .col-sm-12').load("search.php", {param1: serchItem});
                    $('#pagination').css("display", "none");
                }}
            });
        });
    });

</script>
</body>
</html>