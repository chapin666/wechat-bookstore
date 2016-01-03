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
		    default:
			    $this->weChat->text("help info")->reply();
		}
	}
}
