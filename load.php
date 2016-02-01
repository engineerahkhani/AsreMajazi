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
    echo "<a href=\"detailes.php?id=".$id."\" target=\"_blank\"> <h4 class=\"rowActiveTitle \">" . $grp['title'] . "</h4></a>";
   ?>
    <div class=" dirRtl btn-group btn-group-justified "
         role="group" aria-label="...">
                                                                <span class="label  articleProperties "><span><span
                                                                            class="fa fa fa-user-md"></span> <?php echo $grp['user']; ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-clock-o"></span> <?php echo dateconvertfromdb($grp['date']); ?></span>&nbsp;</span>
                                                                <span class="label articleProperties "><span><span
                                                                            class="fa fa fa-eye"></span> <?php echo($grp['view']); ?></span>&nbsp;</span>
    </div><br>
<?php
    echo "<img class=\"img-responsive\" src=\"" . $src . "\"  /> <br>";
    echo "<div> <p class='justified'>" .limitword($grp['sum'],120) . "</p></div>";
    echo "<a  href=\"detailes.php?id=".$id."\" target=\"_blank\"> <h4 class=\"readMore\">"."بیشتر بخوانید ..."."</h4></a>";
    echo " <hr>";
}
?>