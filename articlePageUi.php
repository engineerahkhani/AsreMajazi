<?php include 'config.php';
include 'functions.php';
$n = 0;
$type = 'all';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $n = getnumrows('article', 'id', $id);
    if ($n == 1) {
        $article = mysql_fetch_array(mysql_query("select * from `article` where `id`='" . $id . "'"));
        $type = 'art';
        $v = $article['view'];
        ++$v;
        mysql_query("UPDATE `article` SET `view`='" . $v . "' WHERE `id`='" . $id . "'");
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?php
        if ($n == 1) {
            echo "عصر مجازی  » " . strip_tags($article['title']);
        } else {
            echo "مقالات | Articles";
        }
        ?></title>
    <meta name="description" content="<?php
    if ($n == 1) {
        echo "عصر مجازی  » " . strip_tags($article['title']);
    } else {
        echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    }
    ?>"/>
    <meta name="keywords" content="<?php
    if ($n == 1) {
        echo "عصر مجازی  » " . strip_tags($article['sum']);
    } else {
        echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    }
    ?>"/>
    <link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>

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
            <a class="navbar-brand" href="index.html">Asre Mjazi</a>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><span></span><a href="#welcome" class="fa fa-home fa-1x">&nbsp; تور مجازی</a></li>
                <li><a href="#rezume" class="fa fa-user fa-1x">&nbsp; بانک مقالات</a></li>
                <li><a href="#blog" class="fa fa-rss fa-1x">&nbsp;واقعیت افزوده</a></li>
                <li><a href="#sample" class="fa fa-desktop fa-1x">&nbsp;باشگاه مشتریان</a></li>
                <li><a href="#friends" class="fa fa-group fa-1x">&nbsp;خیریه</a></li>
                <li><a href="#friends" class="fa fa-search fa-1x">&nbsp;<input class="input-sm"> </a></li>



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

                        echo'</a>';
                       // echo "<a href='#?id='$articleId''> <li>" . $grp['title'] . "</li></a>";

                        echo " <div class=\" active\">";
                        echo "<div class=\"carousel-caption\">";
                        echo "<h2><a href=detailes.php?id=$id class=\"carousel-caption-title\">";
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
            <!--end slideShowSection-->
            <section id="mainSection" class="marginTop">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div id="articles">
                                <div class="col-sm-12">
<!--                                    --><?php
//                                    if ($type == 'all') {
//                                        $grp2 = mysql_query("select * from article limit 1,3");
//                                        while ($grp = mysql_fetch_array($grp2)) {
//                                            $doc = new DOMDocument();
//                                            $doc->loadHTML($grp['content']);
//                                            $xml = simplexml_import_dom($doc);
//                                            $images = $xml->xpath('//img');
//                                            $count = count($images);
//                                            if ($count != 0) {
//                                                $src = $images[0]['src'];
//                                            } else {
//                                                $src = 'img/blankpic.jpg';
//                                            }
//                                            echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
//                                            // echo"<img id=\"articleImge\" src=\"img/ar2.jpg\" class=\"img-responsive\">" ;
//                                            $id = $grp['id'];
//                                            echo "<a href=detailes.php?id=$id> <h4>" . $grp['title'] . "</h4></a>";
//                                            echo "<div> <p>" . $grp['sum'] . "</p></div>";
//                                            echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
//                                            echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
//                                            echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
//                                            echo " <hr>";
//                                        }
//                                    }
//                                    else if($type =='art')
//                                    {
//                                        echo 'hi';
//                                    }?>
                                </div>
                            </div>
                            <hr>

                            <div id="pagination">
                                <ul class="pagination">

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <section id="categorySection">
                                <div class="breadcrumb">
                                    <span class="fa fa-2x fa-folder-open-o"></span>
                                    <span><a href="#">صفحه اصلی</a> <span class="divider">/</span></span>
                                    <span><a href="#">مقالات</a> <span class="divider"></span></span>
                                <span><a href="#"> <?php
                                        if ($n == 1) {
                                            echo "  » " . strip_tags($article['title']);
                                        }
                                        ?></a> <span class="divider"></span></span>
                                </div>
                                <h3>موضوعات</h3>
                                <hr>
                                <div class="list-group">
                                    <a href="#" class="list-group-item active"><span
                                            class="count"><?php echo getArticlesCount(); ?></span>همه مقالات
                                    </a>
                                    <?php
                                    $grp2 = mysql_query("select * from `grp` where `mgrp`=0 ");
                                    while ($grp = mysql_fetch_array($grp2)) {
                                        $catId = $grp['name'];
                                        echo "<a href='#' id='$catId'  class=\"list-group-item \"><span class='count'>" . getCountRows($grp['id']) . "</span>" . $grp['name'] . "</a>";
                                        $sgrp2 = mysql_query("select * from `grp` where `mgrp`='" . $grp['id'] . "'");
                                        while ($sgrp = mysql_fetch_array($sgrp2)) {
                                            echo "<div><a href=\"#\" class=\"list-group-item\"><span class='count'>" . getCountRows($grp['id']) . "</span>" . $sgrp['name'] . "</a></div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </section>
                            <section id="topArticles">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span class="fa fa-star-o"></span>&nbsp; محبوبترین مقالات
                                    </div>
                                    <div class="panel-body">
                                        <ol>
                                            <?php
                                            $grp2 = mysql_query("select * from article  ORDER BY view DESC LIMIT 10 ");
                                            while ($grp = mysql_fetch_array($grp2)) {
                                                $id = $grp['id'];
                                                echo "<a href=detailes.php?id=$id> <li>" . $grp['title'] . "</li></a>";
                                            }
                                            ?>
                                        </ol>
                                    </div>
                                </div>
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
    $(function (){
        $('.carousel').carousel({
            interval: 4000
        });
    });
</script>
<script>
    var totalArticles=$("footer div").attr('id').toString();
     localStorage.setItem("category", "all");
    var cat =localStorage.getItem("category");
    alert(cat);
    totalPage =Math.ceil(totalArticles/3);
    alert(totalPage);
    $('#pagination').twbsPagination({
        totalPages:totalPage,
        visiblePages:5,
        first:'شروع',
        prev:'قبلی',
        next:'بعدی',
        last:'پایان',
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
            var category = localStorage.getItem("category");
            $('#articles .col-sm-12').load("test.php", {param1: page, param2:category});
            //category
            $("#categorySection .list-group-item").click(function (e) {
                var categoryName = $(this).attr('id').toString();
                localStorage.setItem("category", categoryName);
                var category = localStorage.getItem("category");
                // var pagNumber = $("#pagination a .active").attr('id').toString();
                $('#articles .col-sm-12').load("test.php", {param1:page, param2: category});
                e.preventDefault();

            });

        }
    });
    $(document).ready(function () {

    });
    //$('pagination').find(a).on('click',function(e){
    // }

</script>
</body>
</html>