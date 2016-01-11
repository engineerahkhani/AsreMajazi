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
    <link rel="stylesheet" type="text/css" href="css/hoverex-all.css" media="all"/>
    <link href="css/style2.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div id="wait" class="wait1"><img src="img/wait.gif"/></div>
<script>
    $(document).ready(function () {
        window.setTimeout(function () {
            $('#wait').removeClass('wait1').addClass('wait0');
            var time = 500;
            $('.art-li').each(function () {
                var $this = $(this);

                function delayed() {
                    $this.css('display', 'inline-block');
                    $this.addClass('box a_normal').addClass('fadeInUp');
                }

                setTimeout(delayed, time);
                time += 500;
            });
        }, 1000)
        $(".main").fadeIn('slow');


    });
</script>
<?php include 'top-menu.php'; ?>
<!--head end-->
<div class="container marginTop">

    <!--article section-->
    <div id="articleSection">
        <div class="row ">
            <div id="searchBarSection">
                <div class="container">
                    <div class="row">
                        <div id="searchBarSectionTitle" class="col-sm-6">
                            <!--<h4><span class="fa fa-book fa-2x"></span>&nbsp;<a href="#"> all</a> »<a href="#">art</a>-->
                            <!--</h4>-->
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
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="جستجو در سایت . . .">
                        <span class="input-group-btn">
                            <button class="btn btn-default"><span class="fa fa-search fa-2x "></span></button>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end searchBarSection-->
            <div id="slideShowSection" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#slideShowSection" data-slide-to="0" class="active"></li>
                    <li data-target="#slideShowSection" data-slide-to="1"></li>
                    <li data-target="#slideShowSection" data-slide-to="2"></li>

                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/ar1.JPG" class="img-responsive">

                        <div class=" active">
                            <div class="carousel-caption">
                                <h2><a href="#" class="carousel-caption-title"> تور مجازی چیست؟ </a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="img/ar2.JPG" class="img-responsive">

                        <div class=" active">
                            <div class="carousel-caption">
                                <h2><a href="#" class="carousel-caption-title"> عکاسی از نوع پانوراما </a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="img/ar3.JPG" class="img-responsive">

                        <div class=" active">
                            <div class="carousel-caption">
                                <h2><a href="#" class="carousel-caption-title"> عکاسی از نوع پانوراما </a></h2>
                            </div>
                        </div>
                    </div>

                </div>
                <a class="left carousel-control" href="#slideShowSection" data-slide="prev"><span
                        class="fa fa-chevron-circle-left"></span></a>
                <a class="right carousel-control" href="#slideShowSection" data-slide="next"><span
                        class="fa fa-chevron-circle-right"></span></a>
            </div>
            <!--end slideShowSection-->
            <section id="mainSection">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div id="articles">
                                <div class="col-sm-12">
                                    <?php
                                    $grp2 = mysql_query("select * from article");
                                    while ($grp = mysql_fetch_array($grp2)) {
                                        echo"<img id=\"articleImge\" src=\"img/ar2.jpg\" class=\"img-responsive\">" ;
                                        echo "<a href='#'> <h4>" . $grp['title'] . "</h4></a>";
                                        echo "<div> <p>" . $grp['sum'] . "</p></div>";
                                        echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
                                        echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
                                        echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
                                        echo " <hr>";
                                    }
                                    ?>
                                    </div>
<!--                                <div class="col-sm-6">-->
<!--                                   -->
<!--<!--                                    <img id="articleImge" src="img/ar2.jpg" class="img-responsive">-->-->
<!--                                </div>-->
                            </div>
                            <hr>

                            <div id="pagination">
                                <ul class="pagination">
                                    <li><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <section id="categorySection">
                                <h3>موضوعات</h3>
                                <hr>
                                <div class="list-group">
                                    <a href="#" class="list-group-item active"><span class="count">33</span>همه مقالات
                                     </a>

                                    <div><a href="#" class="list-group-item " data-toggle="collapse"
                                            data-target="#demo">
                                        <span class="count">33</span><span id="PusIcon" class="fa fa-plus"></span>&nbsp;
                                        تکنولوژی </a>

                                        <div id="demo" class="collapse list-group ">
                                            <div><a href="#" class="list-group-item"><span class="fa fa-minus"></span>&nbsp;
                                                موبایل</a>
                                            </div>
                                            <div><a href="#" class="list-group-item"><span class="fa fa-minus"></span>&nbsp;
                                                کامپیوتر</a>
                                            </div>
                                            <div><a href="#" class="list-group-item"><span class="fa fa-minus"></span>&nbsp;
                                                برنامه
                                                نویسی</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="list-group-item "><span class="count">33</span> عکاسی </a>
                                </div>
                            </section>
                            <section id="topArticles">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span class="fa fa-star-o"></span>&nbsp; محبوبترین مقالات </div>
                                    <div class="panel-body">
                                        <ol>
                                        <?php
                                    $grp2 = mysql_query("select * from article  ORDER BY view DESC LIMIT 10 ");
                                    while ($grp = mysql_fetch_array($grp2)) {
                                        echo "<a href='#'> <li>" . $grp['title'] . "</li></a>";
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
<footer>footer</footer>
<!--end footer section-->


<script>
    $(function () {
        $('.carousel').carousel({
            interval: 2000
        });
    })
</script>
</body>
</html>