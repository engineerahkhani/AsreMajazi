<?php
include 'config.php';
include 'functions.php';
/**
 * Created by PhpStorm.
 * User: AHMAD
 * Date: 1/16/2016
 * Time: 1:52 PM
 */
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?php echo "عصرمجازی|جستجوی مقالات" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="<?php
    echo "عکاسی هلی شات تکنولوژی پانوراما ";
    echo $article['title'];
    echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    ?>"/>
    <meta name="keywords" content="<?php
    echo "عکاسی هلی شات تکنولوژی پانوراما ";
    echo $article['title'];
    echo "  virtual tour  Augmented Reality AR تور مجازی واقعیت افزورده بانک تور تورمجازی";
    ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="loader">Loading...</div>
<?php include 'navbar.php'; ?>
<div class="container-fluid marginTop">
    <div class="row">
        <div class="col-xs-12 col-sm-1  col-lg-2"></div>
        <div class="col-xs-12 col-sm-10  col-lg-8">
            <?php
if(isset($_GET['key'])){
            if (test_input($_GET['key']) != "")
            {
            $flag = preg_match("#(=|'|\")#", test_input($_GET['key']));
            if (!$flag) {

            $searchItem = test_input($_GET['key']);
            $grp2 = mysql_query("SELECT * FROM article WHERE title LIKE '%$searchItem%'");
            $sum = mysql_num_rows($grp2);
            ?>
            <?php
            if ($sum == 0) {
                ?>
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        <span class="fa fa-2x fa-frown-o text-warning" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        متاسفانه نتیجه ای یافت نشد.
                        <a href="articlePageUi.php">بازگشت</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row ">
                    <div class="alert alert-success" role="alert">
                        <span class="fa fa-2x fa-smile-o text-success" aria-hidden="true"></span>
                        <span class="label-success">&nbsp; <?php echo $sum; ?>
                            &nbsp;&nbsp;</span><span>مورد یافت شده است</span>
                    </div>
                </div>
                <?php
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
                    ?>
                    <div class=" col-xs-12 col-sm-6 ">
                        <div class="media">
                            <div class="media-right">
                                <a href="#">
                                    <img width="100" height="60" class="media-object" src="<?php echo $src ?>"
                                         alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="detailes.php?id=<?php echo $grp['id'] ?>" target="_blank"><h6
                                        class="media-heading"><?php echo limitword($grp['title'], 8) ?></h6></a>

                                <div class=" dirRtl btn-group btn-group-justified " role="group"
                                     aria-label="...">
                                            <span><span><span
                                                        class="fa fa fa-user-md"></span> <?php echo $grp['user'] ?></span>&nbsp;</span>
                                            <span><span><span
                                                        class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($grp['date']); ?></span>&nbsp;</span>
                                    <span><span><span class="fa fa fa-eye"></span> <?php echo($grp['view']); ?></span>&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            }
            else
            {
                ?>
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        <span class="fa fa-2x fa-frown-o text-warning" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        کارکتر غیر مجاز
                        <a href="articlePageUi.php">بازگشت</a>
                    </div>
                </div>
                <?php
            }
            }else

            {
            ?>
                <?php
            }
}else echo "
    <div class=\"container marginTop\">
    <div class=\"row\">
        <div class=\"col-xs-10\">
        <div class=\"alert alert-danger\" role=\"alert\">
            <span class=\"fa fa-2x fa-frown-o text-warning\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Error:</span>
            متاسفانه نتیجه ای یافت نشد.
            <a href=\"articlePageUi.php\">بازگشت</a>
        </div>
    </div>
        </div>
        </div>
"; ?>
        </div>
        <div class="col-xs-12 col-sm-1  col-lg-2"></div>
    </div>
</div>
<?php include 'footer.php'; ?>

<script>

</script>
</body>
</html>

