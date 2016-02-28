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

	<div data-role="page" id="pageone">
		
		
<header>
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
<main data-role="content">
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

		<!-- begin footer-->
		<footer data-role="footer" data-position="fixed">
			<div class="nav-menu" data-role="navbar" data-iconpos="top">  
				<ul>
					<li><a href="/Home/Main/index" <?php if((ACTION_NAME) == "index"): ?>id="color-blue"<?php endif; ?> data-icon="grid">所有商品</a></li>
					<li><a href="/Home/Main/category" <?php if((ACTION_NAME) == "category"): ?>id="color-blue"<?php endif; ?> data-icon="navigation">图书分类</a></li>
					<li><a href="/Home/Main/cart" <?php if((ACTION_NAME) == "cart"): ?>id="color-blue"<?php endif; ?> data-icon="shop">购物车</a></li>
					<li><a href="/Home/Main/user"  <?php if((ACTION_NAME) == "user"): ?>id="color-blue"<?php endif; ?> data-icon="user">用户中心</a></li>
				</ul>  
			</div>
		</footer><!-- // end footer -->
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