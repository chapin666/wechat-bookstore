<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="在线图书销售系统">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>图书销售管理系统</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="http://fonts.lug.ustc.edu.cn/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="http://fonts.lug.ustc.edu.cn/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/Public/styles/material.min.css">
    <link rel="stylesheet" href="/Public/styles/styles.css">
  </head>
  <body>

	<!-- start .mdl-layout -->
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
	  
	  <!-- start .mdl-layout__header -->
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--cyan-500">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">{微书店}管理平台</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">输入图书名称...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">关于我们</li>
            <li class="mdl-menu__item">联系方式</li>
          </ul>
        </div>
      </header><!-- // end .mdl-layout__header -->

	  <!-- start .demo-drawer -->
      <div class="demo-drawer mdl-layout__drawer mdl-color--cyan-500 mdl-color-text--white">
		
		<!-- start .demo-drawer-header -->
        <header class="demo-drawer-header">
          <img src="/Public/images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>Admin [ 超级管理员 ]</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item">个人信息</li>
              <li class="mdl-menu__item">注销账户</li>
            </ul>
          </div>
        </header><!-- // end .demo-drawer-header -->

	<!-- start .navigation -->
        <nav class="demo-navigation mdl-navigation mdl-color--cyan-300 mdl-color-text--white">
          <a class="mdl-navigation__link selected" href="<?php echo U('Admin/Index/index');?>"><i class="mdl-color-text--white material-icons" role="presentation">home</i>主页</a>
          <a class="mdl-navigation__link" href="<?php echo U('Admin/Index/category');?>"><i class="mdl-color-text--white material-icons" role="presentation">more</i>图书分类</a>
		  <a class="mdl-navigation__link" href="<?php echo U('Admin/Index/book');?>"><i class="mdl-color-text--white material-icons" role="presentation">local_library</i>图书管理</a>
		  <a class="mdl-navigation__link" href="<?php echo U('Admin/Index/user');?>"><i class="mdl-color-text--white material-icons" role="presentation">people</i>会员中心</a>
          <a class="mdl-navigation__link" href="<?php echo U('Admin/Index/order');?>"><i class="mdl-color-text--white material-icons" role="presentation">shopping_cart</i>订单管理</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="">&copy;2016 微书店科技</a>
        </nav><!-- // end .navigation -->

      </div> <!-- // end .demo-drawer -->

	  <!-- start .mdl-layout__content -->
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

		  <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
              <use xlink:href="#piechart" mask="url(#piemask)" />
              <text font-family="Roboto" fill="#888" font-size="0.1" text-anchor="middle">
				<tspan x="0.5" y="0.45">注册会员</tspan>
				<tspan x="0.5" dy="0.2" fill="#fc5065" font-size="0.2">555</tspan>
				<tspan>位</tspan>
			  </text>
            </svg>

			<svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
              <use xlink:href="#piechart" mask="url(#piemask)" />
              <text font-family="Roboto" fill="#888" font-size="0.1" text-anchor="middle">
				<tspan x="0.5" y="0.45">图书类型</tspan>
				<tspan x="0.5" dy="0.2" fill="#fc5065" font-size="0.2">20</tspan>
				<tspan>种</tspan>
			  </text>
            </svg>


			<svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
              <use xlink:href="#piechart" mask="url(#piemask)" />
              <text font-family="Roboto" fill="#888" font-size="0.1" text-anchor="middle">
				<tspan x="0.5" y="0.45">图书数量</tspan>
				<tspan x="0.5" dy="0.2" fill="#fc5065" font-size="0.2">256</tspan>
				<tspan>本</tspan>
			  </text>
            </svg>
			

			<svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
              <use xlink:href="#piechart" mask="url(#piemask)" />
              <text font-family="Roboto" fill="#888" font-size="0.1" text-anchor="middle">
				<tspan x="0.5" y="0.45">成交订单</tspan>
				<tspan x="0.5" dy="0.2" fill="#fc5065" font-size="0.2">328</tspan>
				<tspan>单</tspan>
			  </text>
            </svg>

          </div>


          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
			<h4>订单信息</h4>
			<div class="demo-graph">
				<span class="demo-graph-span">已完成订单<span class="unit"><a href="###">50</a></span>单</span>
				<span class="demo-graph-span">待付款订单<span class="unit"><a href="###">50</a></span>单</span>
			</div>
			<div class="demo-graph">
				<span class="demo-graph-span">待发货订单<span class="unit"><a href="###">50</a></span>单</span>
				<span class="demo-graph-span">已发货订单<span class="unit"><a href="###">50</a></span>单</span>
			</div>
          </div>

		  <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
			<h4>用户信息</h4>
			<div class="demo-graph">
				<span class="demo-graph-span">共拥有用户<span class="unit"><a href="###">50</a></span>位</span>
				<span class="demo-graph-span">已购买商品用户<span class="unit"><a href="###">50</a></span> 位</span>
			</div>
			<div class="demo-graph">
				<span class="demo-graph-span">新注册用户<span class="unit"><a href="###">50</a></span>位</span>
				<span class="demo-graph-span">拥有用户最多的地区为<span class="unit">四川</span></span>
			</div>
          </div>

		  <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
			<h4>图书信息</h4>
			<div class="demo-graph">
				<span class="demo-graph-span">共销售图书<span class="unit"><a href="###">50</a></span>本</span>
				<span class="demo-graph-span">本月销售图书<span class="unit"><a href="###">50</a></span>本 </span>
			</div>
			<div class="demo-graph">
				<span class="demo-graph-span">购买数量最多的图书<span class="unit">《Golang网络编程》</span></span>
			</div>
			<div class="demo-graph">
				<span class="demo-graph-span">购买数量最少的图书<span class="unit">《三毛流浪记》</span> </span>
			</div>
          </div>


		</div>
      </main>  <!-- // end .mdl-layout__content -->

    </div><!-- // end .mdl-layout  -->



	<!-- start circle svg -->
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg> <!-- // end circle svg -->
    
    <script src="/Public/scripts/material.min.js"></script>
  </body>
</html>