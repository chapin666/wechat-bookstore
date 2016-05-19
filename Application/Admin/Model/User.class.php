<?php
namespace Admin\Model;

class User {

	// all
	public function findLimit($firstRow, $listRows) {
		$u = M("user");
		return $u->limit($firstRow, $listRows)->select();
	}


	// add
	public function add($params) {
		$u = M("user");
		$exists = $this->findUserByOpenId($params['openid']);
		$user = array();
		$user['openid'] = $params['openid'];
		$user['username'] = $params['nickname'];
		$user['gender'] = $params['sex'];
		$user['create_time '] = time();


		if ($exists != null) {
			$user['id'] = $exists['id'];
			$u->save($user);
			return $user['id'];
		} else {
			
			$id = $u->add($user);
			return $id;
		}
	}


	public function delete($id) {
		$u = M('user');
		$u->where('openid= \'' . $id . '\'')->delete();
	}


	public function findUserByOpenId($openId) {
		return  M('user')->where('openId = \'' . $openId . '\'')->find();
	}


		// count
	public function count() {
		$c = M("user");
		return $c->count();
	}




}