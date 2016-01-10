<?php include 'config.php';
//تعریف سرتیترها
$rssfeed = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<urlset
      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
<url><loc>http://asremajazi.com/index.html</loc></url>
<url><loc>http://asremajazi.com/about.php</loc></url>
<url><loc>http://asremajazi.com/tour.php</loc></url>
<url><loc>http://asremajazi.com/articles.php</loc></url>
<url><loc>http://asremajazi.com/ar.php</loc></url>
<url><loc>http://asremajazi.com/club.php</loc></url>
<url><loc>http://asremajazi.com/charity.php</loc></url>";
$url="http://asremajazi.com/";
$app = mysql_query("SELECT `id` FROM `article` ORDER BY `date`DESC");
while ($q=mysql_fetch_array($app)){
	
	$link = $url."articles.php?id=".$q['id'];
	$rssfeed .= "<url>";
	$rssfeed .= "<loc>".$link."</loc>";
	$rssfeed .= "</url>";
}
$rssfeed .= "</urlset>";
//نوشتن اطلاعات در فایل خروجی
$file = "sitemap.xml";
chmod($file, 0755);
$fileHandle = fopen($file, 'w+')
or die("خطا: سطح دسترسی برای ویرایش فایل در سرور تنظیم نیست!");
$stringData = $rssfeed;
fwrite($fileHandle, $stringData);
fclose($fileHandle);	

?>