<meta charset="utf-8" lang="fa">
<link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
<link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
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
<div id="articles">
    <div class="row">
        <div class="col-sm-12">
            <div class="container marginTop">
<!--                navigation-->
                <div class="breadcrumb">
                    <span class="fa fa-2x fa-folder-open-o"></span>
                    <span><a href="articlePageUi.php">صفحه اصلی</a> <span class="divider">/</span></span>

                                <span>
                                    <a href="loadMore.php?id=<?php echo $categoryId ?>"> <?php echo strip_tags($cat['name']); ?> </a><span class="divider">/</span>
                                    <a href="#"> <?php echo strip_tags($article['title']); ?> </a>
                                </span>
                </div>
<!--                end navigation-->
                <?php
                $grp2 = mysql_query("select * from article WHERE id = $id limit 3");
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

                    echo " <h4>" . $grp['title'] . "</h4>";
                    echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
                    echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
                    echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
                    echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
                    echo "<div> <p>" . $grp['sum'] . "</p></div>";
                    echo " <hr>";
                    echo "<div> <p>" . $grp['content'] . "</p></div>";

                }
                ?>
            </div>
        </div>
    </div>
</div>
