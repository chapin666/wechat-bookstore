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
				$datas[$bookId] = $value + 1;
			} else {  // bookId not found
				$datas[$bookId] = $num;
			}
		}
		
		cookie($this->cookieName,  $datas,  $this->expires);
	}


	public function getAll() {
		return  cookie($this->cookieName);
	}


	public function del() {
		
	}

}