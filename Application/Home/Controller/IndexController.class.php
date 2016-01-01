<?php
namespace Home\Controller;
use Home\Common\BaseController;
use Home\Common\MessageUtils;

class IndexController extends BaseController {
	
	public function index() {
	    $wechatObj = new MessageUtils();
	    if (isset($_GET['echostr'])) {
		$wechatObj->valid();
	    }else{
		$wechatObj->responseMsg();
	    }
	}
}
