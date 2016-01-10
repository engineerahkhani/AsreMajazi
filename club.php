<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.2 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html dir="rtl" lang="fa">
<head>
<link rel="SHORTCUT ICON" href="img/favicon.png" />
<title>باشگاه مشتریان | Customers club</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="revisit-after" content="1 day" />
<meta http-equiv="content-language" content="fa">
<meta name="description"
	content="تور مجازی واقعیت افزورده بانک تور تورمجازی  virtual tour  Augmented Reality AR" />
<meta name="keywords"
	content="تور مجازی واقعیت افزورده بانک تور تورمجازی  virtual tour  Augmented Reality AR" />
<link rel="stylesheet" type="text/css" href="css/style2.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/hoverex-all.css"
	media="all" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/film_roll.js" type="text/javascript"></script>
</head>
<body>
	<div id="wait" class="wait1">
		<img src="img/wait.gif" />
	</div>
	<script>
$(document).ready(function() {
	window.setTimeout(function() {
		$('#wait').removeClass('wait1').addClass('wait0');		
		$('#foo5').carouFredSel({
			responsive: true,
			width: '100%',
			scroll: 1,
			items: {
				width: 90,
			//	height: '30%',	//	optionally resize item-height
				visible: {
					min: 7,
					max: 9
				}
			}
		});
	}, 1000);
	$("#login").click(function () {
		$('#wait').removeClass('wait0').addClass('wait1');
		window.setTimeout(function() {
			$('#wait').removeClass('wait1').addClass('wait0');
			$('.error').fadeIn('normal').delay(2000);
			$('.error').fadeOut('normal');
			
		}, 1500);
		
	});
			
	$(".main").fadeIn('slow');
});
</script>
<?php include 'top-menu.php';?>
<div class="main">
		<div class="title">
			<a href="../index.html"> صفحه اصلی </a> » باشگاه مشتریان
		</div>
		<div class="container" style="text-align: center;">
		<table style="width:100%;margin: auto;">
		<tr>
		<td style="width: 50%">
		<div class="loginbox">
				<div class="loginm">
					<input type="text" id="user" placeholder="آدرس ایمیل" style="background-image: url('img/mail.jpg');" /><br /><br /> 
					<input type="password" placeholder="کلمه عبور" style="background-image: url('img/key.jpg');" /><br />
					<br /><br /> <div class="but" id="login" style="width: 70%;margin: auto;padding: 5px 29px;font-size: 0.8em !important;">ورود</div><br/>
					<div style="text-align: right;margin-right: 7%; border-bottom: 1px solid #EEE;padding-bottom: 20px;font-size: 0.7em;font-family: sans-serif;"><input type="checkbox" style="width: 30px;position: relative;top: 2px;"/> مرا به خاطر بسپار
					<br/><br/>
					<span style="cursor: pointer;color: rgb(110,110,110)">کلمه عبور را فراموش کرده اید؟</span>
					</div>
				</div>
				<br/>
			</div>
		</td>
		<td>
		<div style="text-align: center;">
		<img alt="" src="img/monitor-login.png" style="all:unset;width: 350px;position: relative;top: 70px">
		<img alt="" src="img/print.gif" style="all:unset;width: 202px;position: relative;top: -99px">
		
		</div>
		</td>
		</tr>
		</table>
			

			
			<div class="list_carousel responsive">
				<ul id="foo5">
					<li>
						<img src="img/logo/1.png" />
					</li>
					<li>
						<img src="img/logo/2.png" />
					</li>
					<li>
						<img src="img/logo/3.png" />
					</li>
					<li>
						<img src="img/logo/4.png" />
					</li>
					<li>
						<img src="img/logo/5.png" />
					</li>
					<li>
						<img src="img/logo/6.png" />
					</li>
					<li>
						<img src="img/logo/7.png" />
					</li>
					<li>
						<img src="img/logo/8.jpg" />
					</li>
					<li>
						<img src="img/logo/9.jpg" />
					</li>
					<li>
						<img src="img/logo/10.jpg" />
					</li>
					<li>
						<img src="img/logo/11.jpg" />
					</li>
					<li>
						<img src="img/logo/12.jpg" />
					</li>
				</ul>
			
			</div>

	</div>
	</div>
<?php include_once("analyticstracking.php") ?>		
<span class="error">کاربر مورد نظر یافت نشد</span> 	
</body>
</html>