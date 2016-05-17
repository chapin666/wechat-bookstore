<?php
namespace Home\Controller;

use Think\Controller;
use Vendor\Wechat\TPWechat;
use Home\Common\Constants\Constant;
use Vendor\Wechat\Wechat;

use Admin\Model\ShopCart;
use Admin\Model\User;

class IndexController extends Controller {


	private $options = array('token'=>'bookstore',
				 'encodingaeskey'=>'tk3s8FIGe0MjpQyjT7eiMpwhsXHjzFZ5LrSEuoftIfn',
				 'appid'=>'wx9266bc9da8a1f391',
				 'appsecret'=>'e5394eff409fbe82a7828ba0e8ce3aac');

	private $menu = array ('button' => array (
				0 => array ('name' => "购买书籍", 'sub_button' =>  array (
				    0 => array (
				      'type' => 'view',
				      'name' => '最新上架',
				      'url' =>  "http://bashrc.ngrok.cc/Home/Main/index", //Constant::MENU_0_0,
				    ),
				    1 => array (
				      'type' => 'click',
				      'name' => '热销书籍',
				      'key' =>  Constant::MENU_0_1,
				    ),
				    2 => array (
				      'type' => 'view',
				      'name' => '分类浏览',
				      'url' =>  "http://bashrc.ngrok.cc/Home/Main/index",
				    ),
				 ),
				),

				1 => array ('name' => '我的订单', 'sub_button' => array (
				    0 => array (
				      'type' => 'click',
				      'name' => '购物车',
				      'key' =>  Constant::MENU_1_0,
				    ),
				    1 => array (
				      'type' => 'click',
				      'name' => '待付款',
				      'key' =>  Constant::MENU_1_1,
				    ),
				    2 => array (
				      'type' => 'click',
				      'name' => '历史订单',
				      'key' => Constant::MENU_1_2,
				    ),
				),
				),

				2 => array ('name' => '个人中心', 'sub_button' => array (
				    0 => array (
				      'type' => 'click',
				      'name' => '帐号绑定',
				      'key' => Constant::MENU_2_0,
				    ),
				    1 => array (
				      'type' => 'click',
				      'name' => '个人信息',
				      'key' => Constant::MENU_2_1,
				    ),
				    2 => array (
				      'type' => 'click',
				      'name' => '解除绑定',
				      'key' => Constant::MENU_2_2,
				    ),
				),
				),
			    ),
			);


	private $weChat = null;
	
	public function ___construct() {
		$this->weChat = new TPWechat($this->options);
		$this->weChat->valid();
		$this->weChat->createMenu($this->menu);	
	}


	/*
	 *  获取事件类型
	 */
	public function index() {
		$type = $this->weChat->getRev()->getRevType();
		switch($type) {
		    case Wechat::MSGTYPE_TEXT:
			    $this->weChat->text("我只是一个傻傻的机器人")->reply();
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
			
			// get user info by openId
			$openId = $this->weChat->getRevFrom();
			$info = $this->weChat->getUserInfo($openId);

			$userModel = new User();
			$userModel->add($info);

			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。" )->reply();
			break;
			case Wechat::EVENT_UNSUBSCRIBE:
			$openId = $this->weChat->getRevFrom();
			$userModel = new User();
			$userModel->delete($openId);
			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。您的ID为" . $authObject->openid)->reply();
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
				$this->weChat->text('ok')->reply();
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


	public function auth() {
		$url = $this->weChat->getOauthRedirect('http://bashrc.ngrok.cc/Home/Index/address.html', '123',  'snsapi_base');
		$this->redirect ($url);
	}
	

	public function address() {

		// auth
		$accessToken = $this->getOauthAccessToken();

		echo $accessToken;

		// 1 Get all order
		// $cookieUtil = new CookieUtil();
		// $shopCart = new ShopCar();
		// $cookies = $cookieUtil->getAll();

		// $openId = $this->weChat->getRevFrom();

		// foreach ($cookies as $key => $value) {
		// 	if ($key != "" && $value != "") {
		// 		$bookNum = $value;
		// 		$bookId = $key;
		// 		$cart = array("book_id" => $bookId, "user_id"=>$openId, "amount" => $bookNum);
		// 		$shopCart->add($cart);
		// 	}
		// }

		// // 2 create a order

		// // 3 save book info to db


		// $this->display();
	}


}
