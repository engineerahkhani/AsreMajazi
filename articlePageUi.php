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
                <?php
                $grp2 = mysql_query("select * from `grp` where `mgrp`=0 ");
                while ($grp = mysql_fetch_array($grp2)) {
                    $catId = $grp['id'];
                    ?>
                    <li><span></span><a href="#<?php echo $grp['id'] ?>" >
                            &nbsp; <?php echo $grp['name'] ?></a></li>
                <?php } ?>
                <li><a href="#" class="fa fa-search fa-1x">&nbsp;<input class="input-sm"> </a></li>
            </ul>
        </div>
    </nav>
</div>
<!--end navigation-->
<!--head end-->
<div class="container marginTop">
    <!--article section-->
    <div id="articleSection">
        <div class="row ">
            <!--end searchBarSection-->
            <div class="col-xs-12 col-md-8">

                <div id="slideShowSection" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#slideShowSection" data-slide-to="0" class="active"></li>
                        <li data-target="#slideShowSection" data-slide-to="1"></li>
                        <li data-target="#slideShowSection" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $grp2 = mysql_query("select * from article    ORDER BY date and time  LIMIT 3 ");
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
        </div>
    </div>
</div>
<!-- end article section-->
</div>
<section id="mainSection">
    <div class="container">
        <div class="row">
<!--            <div class="hidden-xs col-sm-3">test</div>-->
<!--            <div class="col-xs-12 col-sm-9">-->
                <div class="col-xs-12">
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
                                                    <div class="col-xs-8">
                                                    <h4><a class="rowActiveTitle" target="_blank" href="detailes.php?id=<?php echo $articleDetail['id']; ?>" ><?php echo $articleDetail['title']; ?></a></h4>
                                                    <?php echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $articleDetail['user'] . "</span></span>";
                                                    echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($articleDetail['date']) . "</span></span>";
                                                    echo " <span><span class=\"fa fa-eye\">&nbsp;" . $articleDetail['view'] . "</span></span></div>"; ?>

                                                    <p>
                                                        <?php echo limitword($articleDetail['sum'],80); ?><br>
                                                        <a class="readMore" target="_blank" href="detailes.php?id=<?php echo $articleDetail['id']; ?>" >بیشتر بخوانید...</a>
                                                    </p>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <?php
                                                        $doc = new DOMDocument();
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
                                                        <?php echo "<img class=\"img-responsive\" src=\"" . $src . "\"  width=\"300\" height=\"180\" />"; ?>

                                                </div>
                                                </div>
                                            </div>
                                            <?php

                                        } else {
                                            if ($p == 6) {
                                                ?>
                                                <div class="row" id="rowinActive">
                                                <div class="inactive  ">
                                            <?php } ?>
                                            <div class="col-xs-12 col-sm-6 ">
                                                <div class="row " >
                                                    <div class="col-xs-9" id="rowinActiveItem">
                                                        <h5><a class="rowActiveTitle" target="_blank" href="detailes.php?id=<?php echo $articleDetail['id']; ?>" ><?php
                                                            echo limitword($articleDetail['title'], 8);
                                                            --$p;
                                                            ?>
                                                            </a></h5>
                                                        <?php echo "<span id=\"articlePropertiesRowITem\"> <span><span class=\"fa fa-user\">&nbsp;" . $articleDetail['user'] . "</span></span>";
                                                        echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($articleDetail['date']) . "</span></span>";
                                                        echo " <span><span class=\"fa fa-eye\">&nbsp;" . $articleDetail['view'] . "</span></span></span>"; ?>
                                                    </div>
                                                    <div class="col-xs-3 ">
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
                                                        echo "<img class=\"img-responsive\" src=\"" . $src . "\" height=\"60\" width=\"90\" />";
                                                        ?>
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
        </div>
    </div>
</section>

<!--end mainSection-->
<!--footer section-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="social-icons">klkl;
                <ul>
                    <li><a class="envelope" href="#"><i class="fa fa-envelope fa-2x"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>
                    <li><a class="facebook" href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
                    <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square fa-2x"></i></a></li>
                </ul>
            </div>
            <hr>
            <h5> asremajazi.com &nbsp;<span class="fa fa-copyright"></span> &nbsp;2016</h5>
        </div>
    </div>
    <!--end footer section-->
    <div id=" <?php
    echo getnumrows2("article");
    ?>">
    </div>
</footer>
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
            $(".navbar-nav li input").toggle();


        });
        $(".navbar-nav li input").keypress(function (e) {
            if (e.which == 13) {
                var serchItem = $(this).val();
                $('#mainSection .col-sm-12').load("search.php", {param1: serchItem});
                $('#pagination').css("display", "none");
            }
        })

    });

</script>
</body>
</html>