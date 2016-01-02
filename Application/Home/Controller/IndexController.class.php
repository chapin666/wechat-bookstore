<?php
namespace Home\Controller;

use Think\Controller;
use Vendor\Wechat\TPWechat;
use Vendor\Wechat\Wechat;

class IndexController extends Controller {
	
	 private $options = array(
			'token'=>'wsdbookstore', //填写你设定的key
 			'encodingaeskey'=>'tk3s8FIGe0MjpQyjT7eiMpwhsXHjzFZ5LrSEuoftIfn', //填写加密用的EncodingAESKey
 			'appid'=>'wx9266bc9da8a1f391', //填写高级调用功能的app id
 			'appsecret'=>'e5394eff409fbe82a7828ba0e8ce3aac' //填写高级调用功能的密钥
 		);

	private $menu = array ('button' => array (0 => array ('name' => '扫码',
					'sub_button' => array (
			     	            0 => array (
			     	              'type' => 'scancode_waitmsg',
			     	              'name' => '扫码带提示',
			      	              'key' => 'rselfmenu_0_0',
			      	            ),
			      	            1 => array (
			      	              'type' => 'scancode_push',
			      	              'name' => '扫码推事件',
			     	              'key' => 'rselfmenu_0_1',
			     	            ),
     	        			),
      	      			),
      	      			1 => array ('name' => '发图',
		     	        'sub_button' => array (
		      	            0 => array (
		      	              'type' => 'pic_sysphoto',
		      	              'name' => '系统拍照发图',
		     	              'key' => 'rselfmenu_1_0',
		      	            ),
		      	            1 => array (
		      	              'type' => 'pic_photo_or_album',
		     	              'name' => '拍照或者相册发图',
		      	              'key' => 'rselfmenu_1_1',
		     	            )
		     	        ),
		     	      ),

		     	      2 => array (
		     	        'type' => 'location_select',
		     	        'name' => '发送位置',
		     	        'key' => 'rselfmenu_2_0'
		     	      ),
		      	    ),
      	);



	public function index() {
		$weObj = new TPWechat($this->options);
		$weObj->valid();
		$weObj->createMenu($this->menu);
		$type = $weObj->getRev()->getRevType();
		switch($type) {
		    case Wechat::MSGTYPE_TEXT:
			    $weObj->text("hello, I'm wechat")->reply();
			    exit;
			    break;
		    case Wechat::MSGTYPE_EVENT:
				
			    break;
		    case Wechat::MSGTYPE_IMAGE:
				
			    break;
		    default:
			    $weObj->text("help info")->reply();
		}
	}
}
