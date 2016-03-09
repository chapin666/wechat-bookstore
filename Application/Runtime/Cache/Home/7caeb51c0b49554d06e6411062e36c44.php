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
		
			<header data-role="header" data-position="fixed">
		<a href="#" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-notext">Menu</a>
		<h1>主页</h1>
		<a href="#" class="ui-btn ui-icon-home ui-corner-all ui-btn-icon-notext">Home</a>
	</header>

		<header data-role="header">
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
		</header>

		<!-- begin main-->
		<main data-role="main" class="ui-content">
			<ul class="book-category" data-role="listview">
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