<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Manager;

class LoginController extends  Controller  {

	public function check() {
		$managerModel = new Manager();

		$userName = $_POST['username'];
		$password = $_POST['password'];

		$result = $managerModel->check($userName, $password);
		if ($result != null) {
			header('Location: /Admin/Index/main.html');
		} else {
			$this->redirect('/Admin/Index/index', array("msg"=>"用户名或者密码错误"));
		}
	}


	public function logout() {
		$this->redirect('/Admin/Index/index');
	}

}