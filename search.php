<!--            $flag = preg_match("#(=|'|\")#", test_input($_GET['key']));
            if (!$flag) {

            }
            else
                echo "no";
                -->
<meta charset="utf-8">
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8" lang="fa">
    <link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-fluid marginTop">
    <div class="row">
        <div class="col-xs-12 col-sm-1  col-lg-2"></div>
        <div class="col-xs-12 col-sm-10  col-lg-8">
            <?php
            if (empty($_GET['key']))
            {
                ?>
                <div class="row ">
                    <div class="alert alert-danger " role="alert">
                        <span class="fa fa-2x fa-frown-o text-warning" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        برای شروع جستجو مقداری را در فیلد وارد کنید.
                        <a href="articlePageUi.php">بازگشت</a>
                    </div>
                </div>
                <?php
            }else
            {
            $flag = preg_match("#(=|'|\")#", test_input($_GET['key']));
            if (!$flag) {

            }
            else
                echo "no";
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
            } ?>
        </div>
        <div class="col-xs-12 col-sm-1  col-lg-2"></div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".navbar-nav li input").css("display", "none");
        $(".navbar-nav .fa-search").click(function () {
            $(".navbar-nav li input").slideDown();
            $('.navbar-nav li input').keydown(function (event) {
                if (event.keyCode == '13') {
                    var serchItem = $(this).val();
                    if (serchItem.length === 0 ) {
                        alert("برای شروع جستجو کلمه مورد نظر را در فیلد وارد نمایید.");
                    } else {
                        window.location.replace("search.php?key=" + serchItem);
                        $('#mainSection .col-sm-12').load("search.php", {param1: serchItem});
                        $('#pagination').css("display", "none");
                    }
                }
            });
        });
    });

</script>
</body>
</html>
<?php
}
//validate se
