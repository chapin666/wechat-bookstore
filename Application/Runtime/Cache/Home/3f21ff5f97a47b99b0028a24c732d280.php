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
		
		<!-- toolbar -->
			<header data-role="header">
		<a href="#" class="ui-btn ui-icon-back ui-btn-icon-right ui-corner-all ui-btn-icon-notext">主页</a>
		<h1>分类名称</h1>
		<a href="#" class="ui-btn ui-icon-home ui-btn-icon-right ui-corner-all ui-btn-icon-notext">主页</a>
	</header>
		<!-- begin main-->

		<main data-role="main" class="ui-content">
			<div class="search-box">
				<input type="search" />
			</div>
			<div class="content-box">
				<div class="sortable-box">
					
				</div>
				<div class="book-list">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</main><!-- // end main -->


	</div>

	<script src="/Public/scripts/jquery.min.js"></script>
	<script src="/Public/mobile/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>