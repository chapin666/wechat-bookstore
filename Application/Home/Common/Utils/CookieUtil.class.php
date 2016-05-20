<?php
namespace Home\Common\Utils;

class CookieUtil {

	private $cookieName = "bookstore";
	private $expires = 100000;

	// add cookie
	public function add($bookId, $num) {
		$datas = cookie($this->cookieName);

		// cookie array not found
		if ($datas == null) {
			$datas = array($bookId => $num);
		} else {
			// contains  bookId
			if (isset($datas[$bookId])) {
				$value = $datas[$bookId];
				$datas[$bookId] = $value + $num;
			} else {  // bookId not found
				$datas[$bookId] = $num;
			}
		}
		
		cookie($this->cookieName,  $datas,  $this->expires);
	}


	public function getAll() {
		return cookie($this->cookieName);
	}


	public function setNum($id, $num) {
		$datas = $cookies = cookie($this->cookieName);

		foreach ($cookies as $key => $value) {
			if ($key != "" && $value != "") {
				if ($key == $id) {
					$datas[$id]  = $num;
					break;
				}
			}
		}

		cookie($this->cookieName,  $datas,  $this->expires);
	}

	public function delByBookId($id) {
		$datas = array();
		$cookies = cookie($this->cookieName);

		foreach ($cookies as $key => $value) {
			if ($key != "" && $value != "" && $key != $id) {
					$datas[$id]  = $value;
			}
		}

		cookie($this->cookieName,  $datas,  $this->expires);
	}


	public function del() {
		cookie($this->cookieName, null);
	}


	public function getBookCount() {
		$total = 0;
		$cookies = cookie($this->cookieName);

		foreach ($cookies as $key => $value) {
			if ($key != "" && $value != "") {
					$total += value;
			}
		}
		return $total;
	}

	

}