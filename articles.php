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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.2 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html dir="rtl" lang="fa">
<head>
    <link rel="SHORTCUT ICON" href="img/favicon.png"/>
    <title>
        <?php
        if ($n == 1) {
            echo "عصر مجازی  » " . strip_tags($article['title']);
        } else {
            echo "مقالات | Articles";
        }
        ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="revisit-after" content="1 day"/>
    <meta http-equiv="content-language" content="fa">
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
    <link rel="stylesheet" type="text/css" href="css/style2.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/hoverex-all.css" media="all"/>
    <script src="js/jquery.min.js" type="text/javascript"></script>
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
<div class="main">
    <div class="title"><a href="../index.html"> صفحه اصلی </a> » <a href="../articles.php"> مقالات </a>
        <?php
        if ($n == 1) {
            echo "  » " . strip_tags($article['title']);
        }
        ?>
    </div>
    <table class="maintbl">
        <tr>
            <td class="rightpanel">
                <div class="rightmenu">
                    <div class="top">موضوعات</div>
                    <ul>
                        <?php
                        $grp2 = mysql_query("select * from `grp` where `mgrp`=0");
                        while ($grp = mysql_fetch_array($grp2)) {
                            echo "<li class=\"rmenuli link\" link=\"dash\"><span>" . $grp['name'] . "</span><ul>";
                            $sgrp2 = mysql_query("select * from `grp` where `mgrp`='" . $grp['id'] . "'");
                            while ($sgrp = mysql_fetch_array($sgrp2)) {
                                echo "<li class=\"submenu link\" link=\"hgh\">" . $sgrp['name'] . "</li>";
                            }
                            echo "</ul></li>";
                        }

                        ?>
                    </ul>
                </div>
            </td>
            <td><?php if ($type == 'art') {
                    echo "<div style=\"padding:0 10px\"><div class=\"art-head\">
    <span class=\"arttitle\">" . $article['title'] . "</span>
    &nbsp;
    <span class=\"art-view\">" . $article['view'] . "<img src=\"img/eye.png\" class=\"eye\" /></span>
    </div>";
                    echo "<div class=\"art-container\">" . $article['content'] . "
    <br/><br/><br/>
    <span class=\"art-date\">انتشار: " . dateconvertfromdb($article['date']) . " - " . $article['time'] . "</span><br/></div>";

                    echo "</div>";
                }
                ?>
                <?php if ($type == 'all') { ?>
                    <ul class="art-ul">
                        <?php
                        $art2 = mysql_query("select * from `article` where `act`=1 order by `date` desc, `time` desc");
                        while ($art = mysql_fetch_array($art2)) {
                            $doc = new DOMDocument();
                            $doc->loadHTML($art['content']);
                            $xml = simplexml_import_dom($doc);
                            $images = $xml->xpath('//img');
                            $count = count($images);
                            if ($count != 0) {
                                $src = $images[0]['src'];
                            } else {
                                $src = 'img/blankpic.jpg';
                            }
                            echo "<a href=\"?id=" . $art['id'] . "\"><li class=\"art-li\">
    <table cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">
    <tr><td><img class=\"art-thumb\" src=\"" . $src . "\" /></td>
    <td>
    <div class=\"art\">
    <div class=\"art-title\">" . $art['title'] . "</div>
    <div class=\"art-sum\">" . limitword($art['sum'], 40) . "</div>
    </div>
    </td>
    </tr/>
    </table>
    
    
    </li></a>";
                        }
                        ?>
                    </ul>
                <?php } ?>
            </td>
        </tr>
    </table>


</div>
<?php include_once("analyticstracking.php") ?>
</body>
</html>