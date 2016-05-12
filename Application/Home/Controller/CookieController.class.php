<?php
namespace Home\Controller;

use Think\Controller;
use Home\Common\Utils\CookieUtil;

class CookieController extends Controller {

	public function setNumById() {
		$id = $_POST['bookId'];
		$num = $_POST['bookNum'];
		$cookieUtil = new CookieUtil();
		$cookieUtil->setNum($id, $num);
	}

}