<?php
include 'config.php';
include 'functions.php';
/**
 * Created by PhpStorm.
 * User: AHMAD
 * Date: 1/16/2016
 * Time: 1:52 PM
 */
$searchItem = $_POST['param1'];
echo $searchItem;
    $grp2 = mysql_query("SELECT * FROM article WHERE title LIKE '%$searchItem%'");
$sum = mysql_num_rows($grp2);
echo $sum;
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
    echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
    // echo"<img id=\"articleImge\" src=\"img/ar2.jpg\" class=\"img-responsive\">" ;
    echo "<a href='#'> <h4>" . $grp['title'] . "</h4></a>";
    echo "<div> <p>" . $grp['sum'] . "</p></div>";
    echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
    echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
    echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
    echo " <hr>";
}
?>