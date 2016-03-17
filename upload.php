<?php

	$jarr = array(
		"appName" => "OAUpdate",

		"versionCode" => "1",

		"versionName" => "0.2", 
		
		"apkUrl"=> "", 
		
		"changeLog" => "Version 0.1",

		"updateTips" => "更新提示" 
	);

	$arr = json_encode($jarr);

	print_r($arr);