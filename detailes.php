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
                        </div>
                        <div class="col-xs-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php require 'footer.php' ?>
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".col-xs-10").find('img').addClass('img-responsive img-thumbnail');
            $(".col-xs-10").find('img').css({'margin-right': 'auto', "margin-left": "auto"});

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
            });
        });
    </script>

</body>
</html>