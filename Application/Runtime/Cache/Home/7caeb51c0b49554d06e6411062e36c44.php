<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>微书店主页</title>
	<link rel="stylesheet" href="/tp3/Public/mobile/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="/tp3/Public/styles/swiper-3.3.0.min.css">
	<link rel="stylesheet" href="/tp3/Public/styles/home.css">
</head>
<body>

	<div data-role="page" id="pageone">

		<header>
			<!-- begin swiper -->
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href=""><img src="/tp3/Public/images/banner01.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href=""><img src="/tp3/Public/images/banner01.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href=""><img src="/tp3/Public/images/banner01.png" alt=""></a>
					</div>
				</div>
				<!-- 如果需要分页器 -->
				<div class="swiper-pagination"></div>
			</div><!-- // end swiper -->
		</header>

		<!-- begin main-->
		<main data-role="content">
			<ul class="book-category" data-role="listview">
				<li>
					<a href="#">
						<img src="/tp3/Public/images/child-cover.jpg" alt="">
						<div class="book-text">
							<h2>少儿类</h2>
							<p>少儿类描述</p>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="/tp3/Public/images/social-cover.jpg" alt="">
						<div class="book-text">
							<h2>社科类</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="/tp3/Public/images/art-cover.jpg" alt="">
						<div class="book-text">
							<h2>文艺</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="/tp3/Public/images/life-cover.jpg" alt="">
						<div class="book-text">
							<h2>休闲与生活</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="/tp3/Public/images/doctor-cover.jpg" alt="">
						<div class="book-text">
							<h2>医学</h2>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="/tp3/Public/images/computer-cover.jpg" alt="">
						<div class="book-text">
							<h2>计算机</h2>
						</div>
					</a>
				</li>
			</ul>
		</main><!-- // end main -->


		<!-- begin footer-->
		<footer data-role="footer" data-position="fixed">
			<div data-role="navbar" data-iconpos="top">  
				<ul>  
					<li><a href="###" class="ui-btn-active" data-icon="grid">所有商品</a></li>
					<li><a href="###" data-icon="navigation">查物流</a></li>
					<li><a href="###" data-icon="shop">购物车</a></li>
					<li><a href="###" data-icon="user">用户中心</a></li>
				</ul>  
			</div>
		</footer><!-- // end footer -->
	</div>

	<script src="/tp3/Public/scripts/jquery.min.js"></script>
	<script src="/tp3/Public/mobile/jquery.mobile-1.4.5.min.js"></script>
	<script src="/tp3/Public/scripts/swiper-3.3.0.jquery.min.js"></script>
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