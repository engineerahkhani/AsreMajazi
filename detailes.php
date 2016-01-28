<?php include 'config.php';
include 'functions.php';
$id = $_GET['id'];
//echo $id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $n = getnumrows('article', 'id', $id);
    try {
        $articleGrp = mysql_fetch_array(mysql_query("select grp from article where id='$id'"));
        $categoryId = $articleGrp['grp'];
        $cat = mysql_fetch_array(mysql_query("select * from `grp` where `id`='" . $categoryId . "'"));
        $article = mysql_fetch_array(mysql_query("select * from `article` where `id`='" . $id . "'"));
        $type = 'art';
        $v = $article['view'];
        ++$v;
        mysql_query("UPDATE `article` SET `view`='" . $v . "' WHERE `id`='" . $id . "'");

    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8" lang="fa">
    <link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <?php require 'navbar.php'; ?>
    <!--end navebar-->
    <div id="articles">
        <div class="row marginTop">
            <div class="container ">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-10">
                            <div class="breadcrumb">
                                <span class="fa fa-2x fa-folder-open-o"></span>
                                <span><a href="articlePageUi.php">صفحه اصلی</a> <span class="divider">/</span></span>
                                <span>
                                    <a href="loadMore.php?id=<?php echo $categoryId ?>"> <?php echo strip_tags($cat['name']); ?> </a><span
                                        class="divider">/</span>
                                    <a href="#"> <?php echo strip_tags($article['title']); ?> </a>
                                </span>
                            </div>
                            <!--                            end breadcrumb-->
                            <?php
                            $grp2 = mysql_query("select * from article WHERE id = $id ");
                            while ($grp = mysql_fetch_array($grp2)) {
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
                                echo " <h3 class='modal-title rowActiveTitle'>" . $grp['title'] . "</h3>";
                                echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
                                echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
                                echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
                                echo " <hr>";
                                echo "<div> <p class='justified'>" . $grp['content'] . "</p></div>";
                            }
                            ?>
                            <div class="row">
                                <div class="container">
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">مطالب مرتبط</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php
                                        $grp2 = mysql_query("select * from article WHERE  grp = $categoryId LIMIT 3 ");
                                        while ($grp = mysql_fetch_array($grp2)) {
                                            ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail">
                                                    <?php
                                                    $doc = new DOMDocument();
                                                    $doc->loadHTML($grp['content']);
                                                    $xml = simplexml_import_dom($doc);
                                                    $images = $xml->xpath('//img');
                                                    $count = count($images);
                                                    if ($count != 0) {
                                                        $src = $images[0]['src'];
                                                    } else {
                                                        $src = 'img/blankpic.jpg';
                                                    } ?>
                                                    <img src="<?php echo $src ?>" alt="..." height="60">

                                                    <div class="caption">
                                                        <a href="detailes.php?id=<?php echo $grp['id']; ?>">
                                                            <h5><?php echo limitchar($grp['title'], 50); ?></h5></a>

                                                        <div class=" dirRtl btn-group btn-group-justified "
                                                             role="group">

                                                                                                                            <span
                                                                                                                                class="label articleProperties "><span><span
                                                                                                                                        class="fa fa fa-user-md"></span> <?php echo $grp['user'] ?></span>&nbsp;</span>
                                                                                                                            <span
                                                                                                                                class="label articleProperties "><span><span
                                                                                                                                        class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($grp['date']); ?></span>&nbsp;</span>
                                                                                                                            <span
                                                                                                                                class="label articleProperties "><span><span
                                                                                                                                        class="fa fa fa-eye"></span> <?php echo($grp['view']); ?></span>&nbsp;</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-1">
                            <div href="#" class="scrollup"><span class="fa fa-1x fa-chevron-up "></span></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>
<script>
    $(document).ready(function () {
        $(".col-xs-10").find('img').addClass('img-responsive img-thumbnail');
        $(".col-xs-10").find('img').css({'margin-right': 'auto', "margin-left": "auto"});
//        scrool to top
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>

</body>
</html>