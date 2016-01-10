<?php include 'config.php';include 'jalali.php';
//تعریف سرتیترها
$rssfeed = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\">
<channel>
<title>عصرمجازی | فید آر اس اس</title>
<link>http://asremajazi.com</link>
<description>عصر مجازی | تور مجازی</description>
<language>fa</language>
<copyright>Copyright (C) ".date('Y')." http://asremajazi.com</copyright>";
//انتخاب مطالب از پایگاه داده
$result = mysql_query("SELECT * FROM `article` ORDER BY `date` DESC,`time` DESC LIMIT 0,30");
$url="http://asremajazi.com/";
//استفاده از ردیف های پایگاه داده
while($row = mysql_fetch_array($result)){
	$id = $row['id'];
	$title = $row['title'];
	$title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
	$summary = $row['sum'];
	$summary = htmlspecialchars($summary, ENT_QUOTES, 'UTF-8');
	//تبدیل تاریخ دیتابیس به تاریخ استاندار
	$date = $row['date'];// 22-12-1999
	$date=$date['0'].$date['1'].$date['2'].$date['3']."-".$date['4'].$date['5']."-".$date['6'].$date['7'];
	list( $jyear, $jmonth, $jday ) = preg_split ('/-/', $date);
	list($gyear, $gmonth, $gday ) = jalali_to_gregorian($jyear, $jmonth, $jday );
	$date=$gyear."-".$gmonth."-".$gday;
	$stringArray = explode("-", $date);
	$date = mktime(0,0,0,$stringArray[1],$stringArray[2],$stringArray[0]);
	$convert = date("D, j M Y", $date);
	$date = $convert .' '. $row['time'].' '.'GMT';
	//تعریف لینک خروجی
	$link = $url."articles.php?id=".$id;
	//ایجاد آیتم برای فید
	$rssfeed .= "<item>";
	$rssfeed .= "<title>".$title."</title>";
	$rssfeed .= "<description>".$summary . "</description>";
	$rssfeed .= "<link>" . $link . "</link>";
	$rssfeed .= "<guid>" . $link . "</guid>";
	$rssfeed .= "<pubDate>" . $date . "</pubDate>";
	//$rssfeed .= "<author>" . mail . "(url)"."</author>"; //اختیاری
	$rssfeed .= "<source url=\"".$url."rss.xml\">عصر مجازی</source>";
	$rssfeed .= "</item>";
}
$rssfeed .= "</channel>";
$rssfeed .= "</rss>";
//نوشتن اطلاعات در فایل خروجی
$file = "rss.xml";
chmod($file, 0755);
$fileHandle = fopen($file, 'w+')
or die("خطا: سطح دسترسی برای ویرایش فایل در سرور تنظیم نیست!");
$stringData = $rssfeed;
fwrite($fileHandle, $stringData);
fclose($fileHandle);	

?>