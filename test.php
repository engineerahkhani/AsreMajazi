<?php
include 'config.php';
include 'functions.php';
$pageNumber = $_POST['param1'];
$cat = $_POST['param2'];
$start =(3*($pageNumber-1));
$number = 3;
//echo $cat;
//echo $pageNumber;
//echo $start;

if ($cat == 'all') {
    $grp2 = mysql_query("select * from article limit $start,$number");
//    echo "all";
} else {
    $grp2 = mysql_query("select * from article where grp='$cat'  ORDER BY date and time  LIMIT $start,$number");
//    echo "cat";
}
while ($grp = mysql_fetch_array($grp2)) {
    $doc = new DOMDocument();
    $doc->loadHTML($grp['content']);
    $xml = simplexml_import_dom($doc);
    $images = $xml->xpath('//img');
    $count = count($images);
    $id = $grp['id'];
    if ($count != 0) {
        $src = $images[0]['src'];
    } else {
        $src = 'img/blankpic.jpg';
    }
    echo "<img class=\"img-responsive\" src=\"" . $src . "\"  />";
    // echo"<img id=\"articleImge\" src=\"img/ar2.jpg\" class=\"img-responsive\">" ;
    echo "<a href=\"detailes.php?id=".$id."\" target=\"_blank\"> <h4>" . $grp['title'] . "</h4></a>";
    echo "<div> <p>" . $grp['sum'] . "</p></div>";
    echo "<div id=\"articleProperties\"> <span><span class=\"fa fa-user\">&nbsp;" . $grp['user'] . "</span></span>";
    echo " <span><span class=\"fa fa-clock-o\">&nbsp;" . dateconvertfromdb($grp['date']) . "</span></span>";
    echo " <span><span class=\"fa fa-eye\">&nbsp;" . $grp['view'] . "</span></span></div>";
    echo " <hr>";
}
?>