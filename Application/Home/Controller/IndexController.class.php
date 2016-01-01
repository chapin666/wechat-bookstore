<?php
namespace Home\Controller;
use Think\Controller;
use Home\Common\MessageUtils;

class IndexController extends Controller {
	
	public function index() {
	    $wechatObj = new MessageUtils();
	    if (isset($_GET['echostr'])) {
		$wechatObj->valid();
	    }else{
		$wechatObj->responseMsg();
	    }
	}
}
