<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>微书店主页</title>
	<link rel="stylesheet" href="/Public/mobile/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="/Public/styles/swiper-3.3.0.min.css">
	<link rel="stylesheet" href="/Public/styles/home.css">
</head>

<body>

	<div data-role="page">
	
		<!-- start panel -->
<div id="menu" data-role="panel" data-position="right" >
	<ul data-role="listview">
		<li data-icon="home"><a href="/Home/Main/index">网站主页</a></li>
		<li data-icon="navigation"><a href="/Home/Main/category">图书分类</a></li>
		<li data-icon="shop"><a href="/Home/Main/cart">购物车</a></li>
		<li data-role="collapsible" data-inset="false" data-iconpos="right">
			<h3>个人中心</h3>
			<ul data-role="listview">
				<li><a href="/Home/Main/user">个人资料</a></li>
				<li><a href="#">已购书籍</a></li>
				<li><a href="#">等待付款</a></li>
				<li><a href="#">切换账号</a></li>
			</ul>
		</li><!-- /collapsible -->
	</ul>

</div><!-- /panel -->
		<header data-role="header" data-position="fixed">
			<h1>主页</h1>
			<a href="#menu" class="ui-btn-right ui-btn ui-icon-bars ui-btn-icon-notext ui-shadow ui-corner-all" data-role="button" role="button">Menu</a>
		</header>

		<!-- begin main-->
		<main data-role="main" class="ui-content" >

			<!-- begin swiper -->
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href=""><img src="/Public/images/banner01.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href=""><img src="/Public/images/banner01.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href=""><img src="/Public/images/banner01.png" alt=""></a>
					</div>
				</div>
				<!-- 如果需要分页器 -->
				<div class="swiper-pagination"></div>
			</div><!-- // end swiper -->


			<ul data-role="listview" class="listview"  style="margin: 0;">
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/child-cover.jpg" alt="">
						<div class="book-text">
							<h2>少儿类</h2>
							<p>少儿类描述</p>
						</div>
					</a>
				</li>
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/social-cover.jpg" alt="">
						<div class="book-text">
							<h2>社科类</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/art-cover.jpg" alt="">
						<div class="book-text">
							<h2>文艺</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/life-cover.jpg" alt="">
						<div class="book-text">
							<h2>休闲与生活</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/doctor-cover.jpg" alt="">
						<div class="book-text">
							<h2>医学</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="/Home/Main/bookList">
						<img src="/Public/images/computer-cover.jpg" alt="">
						<div class="book-text">
							<h2>计算机</h2>
						</div>
					</a>
				</li>
			</ul>
		</main><!-- // end main -->

	</div>

	<script src="/Public/scripts/jquery.min.js"></script>
	<script src="/Public/mobile/jquery.mobile-1.4.5.min.js"></script>
	<script src="/Public/scripts/swiper-3.3.0.jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			 var mySwiper = new Swiper ('.swiper-container', {
			    direction: 'horizontal',
			    loop: true,
			    // 如果需要分页器
			    pagination: '.swiper-pagination',
			 });

		});
	</script>
</body>
</html>