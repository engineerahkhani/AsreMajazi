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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
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
                <ul id="topNave" class="nav nav-tabs ">
                    <li class="active"><a data-toggle="tab" href="#recentArticles">جدیدترین</a></li>
                    <li><a data-toggle="tab" href="#topArticles">پربازدیدترین</a></li>
                </ul>
                <div class="tab-content">
                    <div id="topArticles" class="tab-pane fade in active">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php
                                $grp2 = mysql_query("select title,id from article  ORDER BY view DESC LIMIT 6 ");
                                while ($grp = mysql_fetch_array($grp2)) {
                                    ?>
                                    <div class="media">
                                        <div class="media-right">
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <div class="media-body">
                                            <a href="detailes.php?id=<?php echo $grp['id'] ?>">
                                                <h6 class="media-heading"><?php echo limitchar($grp['title'], 100) ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="recentArticles" class="tab-pane fade in dirRtl">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php
                                $grp2 = mysql_query("select title,id from article  ORDER BY DaTE DESC LIMIT 6 ");
                                while ($grp = mysql_fetch_array($grp2)) {
                                    ?>
                                    <div class="media">
                                        <div class="media-right">
                                            <span class="fa fa-clock-o"></span>
                                        </div>
                                        <div class="media-body">
                                            <a href="detailes.php?id=<?php echo $grp['id'] ?>">
                                                <h6 class="media-heading"><?php echo limitword($grp['title'], 7) ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
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
                                     id="<?php echo $grp['id'] ?>"><h5><?php echo $grp['name'] ?> </h5></div>
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
                                                    <div class="row" id="margin-right5">
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-sm-push-6">
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
                                                                <img class="img-responsive" src="<?php echo $src ?>">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-sm-pull-6">
                                                            <a target="_blank"
                                                               href="detailes.php?id=<?php echo $articleDetail['id']; ?>">
                                                                <h4 class="rowactivetitle rowActiveTitle"><?php echo limitchar($articleDetail['title'], 100); ?></h4>
                                                            </a>

                                                            <div class=" dirRtl btn-group btn-group-justified "
                                                                 role="group" aria-label="...">
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-user-md"></span> <?php echo "احمد حسین خانی"; ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($articleDetail['date']); ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-eye"></span> <?php echo($articleDetail['view']); ?></span>&nbsp;</span>
                                                            </div>
                                                            <br>

                                                            <p class="text-justify">
                                                                <?php echo limitchar($articleDetail['sum'], 700); ?><br>
                                                                <a class="readMore" target="_blank"
                                                                   href="detailes.php?id=<?php echo $articleDetail['id']; ?>">بیشتر
                                                                    بخوانید...</a>
                                                            </p>

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
                                                <div class="row" id="margin-right5">
                                                    <div class="media">
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
                                                                <img width="120" height="64" class="media-object"
                                                                     src="<?php echo $src ?>">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <a target="_blank"
                                                               href="detailes.php?id=<?php echo $articleDetail['id']; ?>">
                                                                <h5 class="media-heading rowActiveTitle"><?php --$p;
                                                                    echo limitchar($articleDetail['title'], 100); ?></h5>
                                                            </a>

                                                            <div class=" dirRtl btn-group btn-group-justified "
                                                                 role="group" aria-label="...">
                                                                <span class="label  articleProperties "><span><span
                                                                            class="fa fa fa-user-md"></span> <?php echo "احمد حسین خانی"; ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($articleDetail['date']); ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-eye"></span> <?php echo($articleDetail['view']); ?></span>&nbsp;</span>
                                                            </div>
                                                            <br>
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
                                <div class="panel-footer"><a class="readMore"
                                                             href="loadMore.php?id=<?php echo $grp['id'] ?>"
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
<script>
    $(function () {
        $('.carousel').carousel({
            interval: 4000
        });
    });
</script>
</body>
</html>