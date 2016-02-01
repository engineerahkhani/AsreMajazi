<link type="text/css" rel="stylesheet" href="css/style2.css" media="all">
<script type="text/javascript">
$(document).ready(function(){
	$(".menuli").hide();
	$(".container").show();
	$(".container").addClass('box a_vslow').addClass('fadeIn');
	window.setTimeout(function(){
		$("#top-hdr-menu").show();
		$("#top-hdr-menu").addClass('box a_normal').addClass('fadeInDown');
	},600); 
	window.setTimeout(function(){
		$("[class='menuli'][num='1']").fadeIn();
	},800); 
	window.setTimeout(function(){
		$("[class='menuli'][num='6']").fadeIn();
	},1000); 
	window.setTimeout(function(){
		$("[class='menuli'][num='2']").fadeIn();
	},1200); 
	window.setTimeout(function(){
		$("[class='menuli'][num='5']").fadeIn();
	},1400); 
	window.setTimeout(function(){
		$("[class='menuli'][num='3']").fadeIn();
	},1600); 
	window.setTimeout(function(){
		$("[class='menuli'][num='4']").fadeIn();
	},1800); ; 
	window.setTimeout(function(){
		$("[class='back']").fadeIn();
	},1800); 
	

}); 
</script>
<div id="top-hdr-menu">
<ul>
<li class="menuli" num="1"><a href="about.php" ><img src="img/asr.png" /></a></li>
<li class="menuli" num="2"><a href="tour.php" ><img src="img/tour.png" /></a></li>
<li class="menuli" num="3"><a href="articles.php" ><img src="img/articles.png" /></a></li>
<li class="menuli" num="4"><a href="ar.php" ><img src="img/ar.png" /></a></li>
<li class="menuli" num="5"><a href="club.php" ><img src="img/club.png" /></a></li>
<li class="menuli" num="6"><a href="charity.php" ><img src="img/charity.png" /></a></li>
</ul>
<a class="back" href="index.html">بازگشت</a>
</div>