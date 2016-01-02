<?php
namespace Home\Controller;

use Think\Controller;
use Vendor\Wechat\TPWechat;
use Vendor\Wechat\Wechat;

class IndexController extends Controller {
	
	 private $options = array(
			'token'=>'bookstore', //填写你设定的key
 			'encodingaeskey'=>'6o5FwSKcS10ycYRZ4B8CzCnPyIrBIOPbjdO8qGUh8g4', //填写加密用的EncodingAESKey
 			'appid'=>'wx8036d4cb719e2fa4', //填写高级调用功能的app id
 			'appsecret'=>'652789b17dac68885639fc48e47a2c6b' //填写高级调用功能的密钥
 		);



	public function index() {
		$weObj = new TPWechat($this->options);
		$weObj->valid();
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
