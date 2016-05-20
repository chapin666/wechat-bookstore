<?php
namespace Admin\Model;

class Manager {

	public function check($userName, $pwd) {
		$m = M("manager");
		return $m->where("account='".$userName."' and password='" . $pwd."'")->find();
	}

}
