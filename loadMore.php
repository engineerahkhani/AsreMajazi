<?php include 'config.php';
include 'functions.php';
$categoryId = $_GET['id'];
try {
    $article = mysql_fetch_array(mysql_query("select * from `grp` where `id`='" . $categoryId . "'"));

} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
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
    <link href="css/animsition.min.css" media="all" rel="stylesheet" type="text/css">

</head>
<body>

<!--navigation goes here-->

<!--end navigation-->
<!--head end-->
<div class="row marginTop ">
    <div class="container">
        <div class="breadcrumb">
            <span class="fa fa-2x fa-folder-open-o"></span>
            <span><a href="articlePageUi.php">صفحه اصلی</a> <span class="divider">/</span></span>

                                <span>
                                    <a href="#"> <?php echo strip_tags($article['name']); ?>
                                    </a>
                                </span>
        </div>

        <hr>
    </div>
</div>
<div class="container">
    <!--article section-->
    <div id="articleSection">
        <div class="row ">

            <section id="mainSection">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div id="articles">
                                <div class="col-sm-12">
                                    <!--                                  show article list here-->
                                </div>
                            </div>
                            <hr>

                            <div id="pagination">
                                <ul class="pagination">
                                    <li><a href="#" id="prev">&raquo;</a></li>
                                    <?php for ($i = 1; $i <= getCountRows($categoryId) / 3; $i++) {
                                        echo "<li class=\"active\"><a id='$i' href='#'>";
                                        echo "$i";
                                        echo "</a></li>";
                                    } ?>
                                    <li><a href="#" id="next">&laquo;</a></li>
                                </ul>
                            </div>
                            </ul>

                        </div>
                        <div class="col-sm-4">
                            <section id="categorySection">
                                <h4>دسته بندی ها</h4>
                                <hr>
                                <div class="list-group">
                                    <a href="#" class="list-group-item active"  id="catAll"><span
                                            class="count"><?php echo getArticlesCount(); ?></span>همه مقالات
                                    </a>
                                    <?php
                                    $sgrp2 = mysql_query("select * from `grp` where `mgrp`=$categoryId");
                                    while ($sgrp = mysql_fetch_array($sgrp2)) {
                                        $catId = $sgrp['id'];
                                        echo "<div><a  class=\"list-group-item\" id='$catId'  ><span class='count'>" . getCountRows($catId) . "</span>" . $sgrp['name'] . "</a></div>";
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
                                            $grp2 = mysql_query("select * from article where grp = $categoryId ORDER BY view DESC LIMIT 10 ");
                                            while ($grp = mysql_fetch_array($grp2)) {
                                                $id = $grp['id'];
                                                echo "<a href=\"detailes.php?id=" . $id . "\" target=\"_blank\"> <li>" . $grp['title'] . "</li></a>";
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
    echo getCountRows($categoryId);
    ?>">
    </div>
    <div id=" <?php
    echo $categoryId;
    ?>">
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/animsition.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>
<script>
    $(document).ready(function () {


        var totalArticles = $("footer div:first-child").attr('id').toString();
        var categoryId = $("footer div:nth-child(2)").attr('id').toString();
        var totalPage = Math.ceil(totalArticles / 3);
         $currentPage=1;

        $(".list-group div a").click(function () {

            $("#articles .col-sm-12").load("load.php", {param1: '1', param2: '174'});
        });

        $("#catAll").click(function () {
                    $('#articles .col-sm-12').load("load.php", {param1: '1', param2: categoryId});

        });

        $("#pagination ul li a").click(function(){
            var $page = $(this).attr("id");
          $currentPage = $page;
            $('#articles .col-sm-12').load("load.php", {param1:$page, param2: categoryId});
       alert($currentPage);
        });

        $("#pagination #next").click(function(){
            var $page = parseInt($currentPage.text(),10);

            //$('#articles .col-sm-12').load("load.php", {param1:$page, param2: categoryId});
        });

        $("#pagination #prev").click(function(){
            var $page = --$currentPage;
            $('#articles .col-sm-12').load("load.php", {param1:$page, param2: categoryId});
        });

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

</script>
</body>
</html>