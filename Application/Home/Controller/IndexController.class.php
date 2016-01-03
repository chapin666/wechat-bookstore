<?php
namespace Home\Controller;

use Home\Common\Controller\BaseController;
use Vendor\Wechat\Wechat;

class IndexController extends BaseController {


	public function index() {
		$type = $this->weChat->getRev()->getRevType();
		switch($type) {
		    case Wechat::MSGTYPE_TEXT:
			    $this->weChat->text("hello, I'm wechat")->reply();
			    exit;
			    break;
		    case Wechat::MSGTYPE_EVENT:
			    
			    break;
		    case Wechat::MSGTYPE_IMAGE:
			   
			    break;
		    case Wechat::EVENT_SUBSCRIBE: 
			    $this->weChat->text("欢迎关注【微书店】，祝您购书愉快。");
			    exit;
			    break;
		    default:
			    $this->weChat->text("help info")->reply();
		}
	}
}
