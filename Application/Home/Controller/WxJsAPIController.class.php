<?php
namespace Home\Controller;

use Think\Controller;

class WxJsAPIController extends Controller {

	public function index(){
	        //商户基本信息,可以写死在WxPay.Config.php里面，其他详细参考WxPayConfig.php        
	        define('APPID','wx9dc408cb04cd6d2d');
	        define('MCHID', '1709319401');
	        define('KEY', 'e10adc3949ba59abbe56e757f20f883e');
	        define('APPSECRET', '8c97c84a34f4be1d46bd35b7e51df86a');    
	        vendor('Pay.JSAPI');
	        $tools = new \JsApiPay();
	        $openId = 'oql2ZwUwTvQsD73jTZuzRc2KFYEA';
	        $Out_trade_no=date('YHis').rand(100,1000);
	        $Total_fee='测试';
	        $Body='买了什么书籍';
	        $Total_fee=1;
	        $input = new \WxPayUnifiedOrder();
	        $input->SetBody($Body);
	        $input->SetOut_trade_no($Out_trade_no);
	        $input->SetTotal_fee($Total_fee);
	        $input->SetNotify_url("http://xx.xxx.com/pay/notify.php");
	        $input->SetTrade_type("JSAPI");
	        $input->SetOpenid($openId);
	        $order = \WxPayApi::unifiedOrder($input);
	        $this->jsApiParameters = $tools->GetJsApiParameters($order);
	        $this->display();
    	}
}
