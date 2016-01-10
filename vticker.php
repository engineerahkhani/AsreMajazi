<?php include 'config.php';?>
<span style="float: right;margin-left: 10px">آخرین مقالات » </span> 
<div >
<ul id="vticker" style="margin: 0;list-style: none;">
    <?php $q=mysql_query("SELECT `id`,`title` FROM `article` ORDER BY `date` DESC,`id` DESC LIMIT 0,10");
while ($sql=mysql_fetch_array($q)){
    echo "<li><a style=\"color:#AAA\" href=\"articles.php?id=".$sql['id']."\" >".$sql['title']."</a></li>";
}
?>
 </ul>
 </div>
