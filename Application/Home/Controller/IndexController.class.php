<?php
namespace Home\Controller;

use Home\Common\Controller\BaseController;
use Home\Common\Constants\Constant;
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
			    $this->handleEvent();
			    exit;
			    break;
		    case Wechat::MSGTYPE_IMAGE:
			   
			    break;
		    default:
			    $this->weChat->text("help info")->reply();
		}
	}

	
	/*
	* 
	* 订阅/取消订阅事件
	*/
	private function handleEvent() {
		$eventObj = $this->weChat->getRev()->getRevEvent();
		$event = $eventObj['event'];
		$key = $eventObj['key'];
		
		switch ($event) {
			case Wechat::EVENT_SUBSCRIBE:
			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。")->reply();
			break;
			case Wechat::EVENT_UNSUBSCRIBE:
			$this->weChat->text("欢迎再次关注【微书店】，祝您生活愉快。")->reply();
			break;
			case Wechat::EVENT_MENU_CLICK:
			$this->menuEvent($key);			
			break;
		}
	}

	/*
	 * 菜单点击事件
	 */
	private function menuEvent($key) {
		$this->weChat->text("点击事件， key = " . $key)->reply();
	}
	
}
