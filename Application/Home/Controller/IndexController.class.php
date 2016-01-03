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
			    handleEvent();
			    exit;
			    break;
		    case Wechat::MSGTYPE_IMAGE:
			   
			    break;
		    default:
			    $this->weChat->text("help info")->reply();
		}
	}
	
	public function handleEvent() {
		$eventObj = $this->weChat->getRev()->getRevEvent();
		$event = $eventObj['event'];
		$key = $eventObj['key'];
		if ($event == Wechat::EVENT_SUBSCRIBE) {
			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。")->reply();
                } else if ($event == Wechat::EVENT_UNSUBSCRIBE) {
			$this->weChat->text("欢迎再次关注【微书店】，祝您生活愉快。")->reply();
		}
	}
}
