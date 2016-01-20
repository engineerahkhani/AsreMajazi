<?php include 'config.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>عصرمجازی | مقالات</title>
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Asre Mjazi</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--site logo-->
            <a class="navbar-brand" href="index.html"> عصر مجازی</a>
            <a class="navbar-brand" href="index.html">صفحه ی اصلی</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><span></span><a href="#168" class="fa fa-home fa-1x">&nbsp; تور مجازی</a></li>
                <li><a href="#" class="fa fa-user fa-1x">&nbsp; تکنولوژی</a></li>
                <li><a href="#169" class="fa fa-rss fa-1x">&nbsp;عکاسی</a></li>
                <li><a href="#171" class="fa fa-desktop fa-1x">&nbsp;واقعیت افزوده</a></li>
                <li><a href="#175" class="fa fa-group fa-1x">&nbsp;هلی شات</a></li>
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
                            // echo "<a href='#?id='$articleId''> <li>" . $grp['title'] . "</li></a>";
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
                            class="fa fa-chevron-circle-left"></span></a>
                    <a class="right carousel-control" href="#slideShowSection" data-slide="next"><span
                            class="fa fa-chevron-circle-right"></span></a>
                </div>
                <!--                end slideShowSection-->
            </div>
            <div class="col-xs-12 col-md-4 dirRtl">
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
                    <div id="recentArticles" class="tab-pane fade in ">
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

        <section id="mainSection">

            <div class="row">
                <div class="col-sm-12">
                    <div id="articles">
                        <section id="categorySection">
                            <?php
                            $grp2 = mysql_query("select * from `grp` where `mgrp`=0 ");
                            while ($grp = mysql_fetch_array($grp2)) {
                                $catId = $grp['id'];
                                //start panel
                                echo "<div class=\" panel panel-default\">";
                                echo "<div class=\"panel-heading\">";
                                echo "<span id='$catId' >" . $grp['name'] . "</span>";
                                echo "</div>";
                                //panel body
                                echo "<div class=\"panel-body\">";

                                $article = mysql_query("select * from article where grp = $catId ORDER BY date DESC LIMIT 7");
                                $j = 0;
                                while ($articleDetail = mysql_fetch_array($article)) {
                                    $id = $articleDetail['id'];

                                    if ($j == 0) {
                                        echo "<div class='active'>";
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
                                        echo "<a href=\"detailes.php?id=" . $id . "\" target=\"_blank\"> <h4>" . $articleDetail['title'] . "</h4></a>";
                                        echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $articleDetail['user'] . "</span></span>";
                                        echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($articleDetail['date']) . "</span></span>";
                                        echo " <span><span class=\"fa fa-eye\">&nbsp;" . $articleDetail['view'] . "</span></span></div>";

                                        echo " <hr>";

                                        echo "  <div class=\"col-xs-6\">";
                                        echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
                                        echo "</div";
                                        echo "  <div class=\"col-xs-6\">";

                                        echo " <p>" . $articleDetail['sum'] . "</p></div>";
                                        echo "</div";
//


                                    } else {
                                        ?>
                                        <div class="row">
                                        <div class="col-xs-12 col-md-6" id="panel-raw">
                                            <?php
//                                            $doc = new DOMDocument();
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
                                            <div class="col-xs-8">
                                                <?php
                                                echo "<a href=\"detailes.php?id=" . $id . "\" target=\"_blank\"> <h6>" . $articleDetail['title'] . "</h6></a>";
//                                                echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $articleDetail['user'] . "</span></span>";
//                                                echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($articleDetail['date']) . "</span></span>";
//                                                echo " <span><span class=\"fa fa-eye\">&nbsp;" . $articleDetail['view'] . "</span></span></div>";
                                                ?>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php
//                                                echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
                                                ?>
                                            </div>

                                        </div>
                                        </div>
                                        <?php
                                  }
                                    ++$j;

                                }
//end panel body
                                echo "</div>";
                                echo "<div class=\"panel-footer\">";
                                echo "<a href=\"loadMore.php?id=" . $catId . "\" target=\"_blank\">
                                         مشاهده عنوان‌های بیشتر
                                         </a>";
//                                end panel footer

                                echo "</div>";
//                                end panel
                                echo "</div>";

                            }
                            ?>


                        </section>
                    </div>
                </div>
            </div>

        </section>
        <!--end mainSection-->
    </div>
</div>
<!-- end article section-->
</div>
<!--footer section-->
<footer id="footer">footer
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
//    var totalArticles=$("footer div").attr('id').toString();
//     localStorage.setItem("category", "all");
//    var cat =localStorage.getItem("category");
//    alert(cat);
//    totalPage =Math.ceil(totalArticles/3);
//    alert(totalPage);
//            $("#catAll").click(function(){
//                alert("all");
//                $('#pagination').twbsPagination({
//                    totalPages:totalPage,
//                    visiblePages:5,
//                    first:'شروع',
//                    prev:'قبلی',
//                    next:'بعدی',
//                    last:'پایان',
//                    onPageClick: function (event, page) {
//                        $('#page-content').text('Page ' + page);
////            var category = localStorage.getItem("category");
//                        $('#articles .col-sm-12').load("test.php", {param1: page, param2:'all'});
//                    }
//                });
//            });
//            $(".list-group-item").click(function () {
//               var $id =  $(this).attr('id');
//                switch ($id){
//                    case '168':
//                        alert("168");
////                        $('#mainSection .col-sm-8').empty();
//                            $('#pagination').twbsPagination({
//                                totalPages:10,
//                                visiblePages:5,
//                                first:'شروع',
//                                prev:'قبلی',
//                                next:'بعدی',
//                                last:'پایان',
//                                onPageClick: function (event, page) {
//                                    $('#page-content').text('Page ' + page);
//                                    $('#articles .col-sm-12').load("test.php", {param1: page, param2:'168'});
//                                }
//                            });
//                        break;
//                    case '169':
////                        $('#mainSection .col-sm-8').empty();
//                        $('#pagination').twbsPagination({
//                            totalPages:10,
//                            visiblePages:5,
//                            first:'شروع',
//                            prev:'قبلی',
//                            next:'بعدی',
//                            last:'پایان',
//                            onPageClick: function (event, page) {
//                                $('#page-content').text('Page ' + page);
//                                $('#articles .col-sm-12').load("test.php", {param1: page, param2:'169'});
//                            }
//                        });
//                        break;
//                    case '171':
//                        alert("171");
//                        break;
//                    case '175':
//                        alert("175");
//                        break;
//                    case '174':
////                        alert("174");
//                        break;
//                }
////                alert($id);
//
//            });
//            $("#catAll").click(function(){
////                $('#mainSection .col-sm-8').empty();
//                alert("all");
//                $('#pagination').twbsPagination({
//                    totalPages:10,
//                    visiblePages:5,
//                    first:'شروع',
//                    prev:'قبلی',
//                    next:'بعدی',
//                    last:'پایان',
//                    onPageClick: function (event, page) {
//                        $('#page-content').text('Page ' + page);
////            var category = localStorage.getItem("category");
//                        $('#articles .col-sm-12').load("test.php", {param1: page, param2:'all'});
//                    }
//                });
//            });


        $(".navbar-nav li input").css("display", "none");
        $(".navbar-nav .fa-search").click(function () {
            $(".navbar-nav li input").css("display", "inline");
        });
        $(".navbar-nav li input").keypress(function (e) {
            if (e.which == 13) {
                var serchItem = $(this).val();
                $('#mainSection .col-sm-12').load("search.php", {param1: serchItem});
                $('#pagination').css("display", "none");
            }
        })
        $("#catAll").click();
    });
    //$('pagination').find(a).on('click',function(e){
    // }
</script>
</body>
</html>