<?php
namespace Home\Controller;

use Think\Controller;
use Home\Common\Utils\CookieUtil;
use Admin\Model\Category;
use Admin\Model\Book;

class MainController extends Controller {

	private $wechatController = null;

	public _initialize() {
		$this->wechatController = new Home\Common\Controller\BaseController();
	}


	public function index() {

		$category = new Category();
		$categorys = $category->findAll();

		$this->assign('categorys', $categorys);
		$this->display();
	}


	public function bookList() {
		$id = I('id');

		$bookModel = new Book();
		$books = $bookModel->findBookByCategoryId($id);

		$this->assign("books",  $books);
		$this->display();
	}

	

	public function book() {
		$id = I('id');

		$bookModel = new Book();
		$book = $bookModel->findBookById($id);

		$this->assign("book", $book);
		$this->display();
	}




	public function category() {
		$this->display();
	}

	
	public function cart() {

		$cookieUtil = new CookieUtil();
		$bookModel = new Book();
		$cookies = $cookieUtil->getAll();

		$i = 0;
		$books = array();


		foreach ($cookies as $key => $value) {

			if ($key != "" && $value != "") {

				$bookNum = $value;
				$bookId = $key;
				$book = $bookModel->findBookById($bookId);

				$books[$i] = array('bookNum' => $bookNum, "bookId" => $bookId, "name" => $book['name'],
					"location" => $book['location'], "price_now" => $book['price_now'], "total_count" => $book['total_count']);
				$i++;
			}
		}



		$this->assign("books", $books);

		$this->display();
	}

	public function user() {
		$this->display();
	}


	public function address() {

		// 1. 获取用户提交的书籍编号和数量
		// 2. 获取用户名
		// 3. 创建一个订单，并将订单详细信息存放数据库
		$ids = I('book-id');
		$nums = I('book-num');
		// $wechat->

		

		$this->display();
	}



	public function orderList() {
		$this->display();
	}



	public function order() {
		$this->display();
	}



	// Add cookie 
	public function addCart() {
		$bookId = $_POST['bookId'];
		$bookNum = $_POST["bookNum"];

		$cookieUtil = new CookieUtil();
		$cookieUtil->add($bookId, $bookNum);

		$this->ajaxReturn(true);
	}


	// Buy
	public function buy() {

		$bookId = $_POST['book-id'];
		$bookNum = $_POST['book-number'];
		
		$cookieUtil = new CookieUtil();
		$cookieUtil->add($bookId, $bookNum);

		$this->redirect('/Home/Main/cart');
	}


	
}
