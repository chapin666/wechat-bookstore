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

	<div data-role="page" data-transition="slide">


		<header data-role="header" data-position="fixed">
	<a href="#" data-rel="back" class="ui-btn-left ui-btn ui-icon-back ui-btn-icon-notext ui-shadow ui-corner-all"  data-role="button" role="button">Back</a>
	<h1>主页</h1>
	<a href="#menu" class="ui-btn-right ui-btn ui-icon-bars ui-btn-icon-notext ui-shadow ui-corner-all" data-role="button" role="button">Menu</a>
</header>
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


		<main data-role="main" class="ui-content">
			<div class="search-box">
				<input type="search" />
			</div>
			<div class="content-box">
				<div class="sortable-box">
					
				</div>
				<ul data-role="listview" style="margin: 0;">
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
				</ul>
			</div>
		</main><!-- // end main -->


	</div>

	<script src="/Public/scripts/jquery.min.js"></script>
	<script src="/Public/mobile/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>