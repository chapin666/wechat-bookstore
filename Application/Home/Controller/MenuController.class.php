<?php
namespace Home\Controller;

use Home\Common\Controller\BaseController;
use Home\Common\Constants\Constant;
use Vendor\Wechat\Wechat;

class MenuController extends BaseController {


	/*
	 *  获取事件类型
	 */
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
		switch ($key) {
			case Constant::MENU_0_0:
			
				break;
			case Constant::MENU_0_1:

				break;
			case Constant::MENU_0_2:

				break;
			case Constant::MENU_1_0:

				break;
			case Constant::MENU_1_1:

				break;
			case Constant::MENU_1_2:

				break;
			case Constant::MENU_2_0:
				$this->weChat->text("欢迎绑定帐号")->reply();
				break;
			case Constant::MENU_2_1:
				$this->weChat->text("您的个人信息")->reply();
				break;
			case Constant::MENU_2_2:
				$this->weChat->text("解绑帐号成功")->reply();
				break;
			default: 
			  	$this->weChat->text("发送指令：" . $key . "错误")->reply();
				break;	
		}
	}
	
}
