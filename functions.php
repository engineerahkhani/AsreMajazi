<?php
function dateconvertfromdb($name){
$name=$name['0'].$name['1'].$name['2'].$name['3']."/".$name['4'].$name['5']."/".$name['6'].$name['7'];
return $name;	
}
function progetfrom($table,$what,$where,$result){
	$a="SELECT * FROM `".$table."` WHERE `".$where."`='".$result."'";
	$a2=mysql_query($a);
	$result1=mysql_fetch_array($a2);
	$result2=$result1[$what];
	return $result2;
} 
function getnumrows($table,$where,$result){
	$a="SELECT `id` FROM `".$table."` WHERE `".$where."`='".$result."'";
	$result2=mysql_num_rows(mysql_query($a));
	return $result2['0'];
}
function getArticlesCount(){
	$a="select COUNT(*) from article";
	$result2=mysql_fetch_array(mysql_query($a));
	return $result2['0'];
}
function getCountRows($id){
	$a="select COUNT(*) from article where grp='$id'";
	$result2=mysql_fetch_array(mysql_query($a));
	return $result2['0'];
}
function getnumrows2($table){
	$a="SELECT `id` FROM `".$table."`";
	$result2=mysql_num_rows(mysql_query($a));
	return $result2;
} 
function limitword($string, $limit){
	$s='';
	$string=strip_tags($string);
	$words = explode(" ",$string);
	$num=count($words);
	$output = implode(" ",array_splice($words,0,$limit));
	if ($num > $limit)$s=" ... ";
	return $output.$s;
}

function limitchar($string,$limit){
	$s='';
	$output='';
	$string=strip_tags($string);
	$words = explode(" ",$string);
	$num=count($words);
	$len=0;
	foreach ($words as $word){
		$len+=strlen($word);
		++$len;
		if ($len<$limit)$output .= $word." ";
	}

	if (strlen($string) > $limit)$s=" ... ";
	return $output.$s;
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function showdate(){
	date_default_timezone_set('Asia/Tehran');
	list($gyear, $gmonth, $gday ) = preg_split ('/-/', date("Y-m-d"));
	list( $jyear, $jmonth, $jday ) = gregorian_to_jalali($gyear, $gmonth, $gday);
	$day= date("w");
	switch ($day) {
		case "0": $dname= "یکشنبه";
		break;
		case "1": $dname= "دوشنبه";
		break;
		case "2": $dname= "سه شنبه";
		break;
		case "3": $dname= "چهارشنبه";
		break;
		case "4": $dname= "پنج شنبه";
		break;
		case "5": $dname= "جمعه";
		break;
		case "6": $dname= "شنبه";
		break;
	}
	switch ($jmonth) {
		case "1": $mname= "فروردین";
		break;
		case "2": $mname= "اردیبهشت";
		break;
		case "3": $mname= "خرداد";
		break;
		case "4": $mname= "تیر";
		break;
		case "5": $mname= "مرداد";
		break;
		case "6": $mname= "شهریور";
		break;
		case "7": $mname= "مهر";
		break;
		case "8": $mname= "آبان";
		break;
		case "9": $mname= "آذر";
		break;
		case "10": $mname= "دی";
		break;
		case "11": $mname= "بهمن";
		break;
		case "12": $mname= "اسفند";
		break;
	}
	echo $dname." ".$jday." ".$mname." ".$jyear;
}



?>