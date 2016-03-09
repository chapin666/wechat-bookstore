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
	<a href="#menu" class="ui-btn ui-icon-bars  ui-corner-all 
		ui-btn-icon-notext">Menu</a>
	<h1>主页</h1>
	<a href="/Home/Main" class="ui-btn ui-icon-home ui-corner-all
		ui-btn-icon-notext">Home</a>
</header>
		<!-- start panel -->
<div id="menu" data-role="panel" data-position="left" >
	<ul data-role="listview">
		<li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
		<li data-icon="home"><a href="/Home/Main/index">Home</a></li>
		<li data-icon="navigation"><a href="/Home/Main/category">Category</a></li>
		<li data-icon="shop"><a href="/Home/Main/cart">Cart</a></li>
		<li data-role="collapsible" data-inset="false" data-iconpos="right">
			<h3>User</h3>
			<ul data-role="listview">
				<li><a href="/Home/Main/user">Personal</a></li>
				<li><a href="#">shop</a></li>
				<li><a href="#">cart</a></li>
				<li><a href="#">Exit</a></li>
			</ul>
		</li><!-- /collapsible -->
	</ul>

</div><!-- /panel -->

		<!-- begin main-->
		<main data-role="main" class="ui-content">
			
		</main><!-- // end main -->

	</div>

	<script src="/Public/scripts/jquery.min.js"></script>
	<script src="/Public/mobile/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>