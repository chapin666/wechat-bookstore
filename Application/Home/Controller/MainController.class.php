<?php
namespace Home\Controller;

use Think\Controller;
use Home\Common\Utils\CookieUtil;
use Admin\Model\Category;
use Admin\Model\Book;
use Admin\Model\ShopCart;
use Admin\Model\Order;

class MainController extends Controller {

	// 分类
	public function index() {
		$category = new Category();
		$categorys = $category->findAll();

		$this->assign('categorys', $categorys);
		$this->display();
	}

	// 查询最新的图书
	public function news() {
		$bookModel = new Book();
		$books = $bookModel->findBookByNews(7);
		$this->assign("books",  $books);
		$this->display('bookList');
	}

	// 查找最热的
	public function hots() {
		$bookModel = new Book();
		$books = $bookModel->findBookByHots(7);
		$this->assign("books",  $books);
		$this->display('bookList');
	}


	// 获取某类型的所有图书
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

		$total = 0;
		foreach ($cookies as $key => $value) {

			if ($key != "" && $value != "") {

				$bookNum = $value;
				$bookId = $key;
				$book = $bookModel->findBookById($bookId);

				$books[$i] = array('bookNum' => $bookNum, "bookId" => $bookId, "name" => $book['name'],
					"location" => $book['location'], "price_now" => $book['price_now'], "total_count" => $book['total_count']);
				$total += $value;
				$i++;
			}
		}



		$this->assign("books", $books);
		$this->assign("total", $total);

		$this->display();
	}




	public function user() {
	}


	public function order() {
		$id = I('id');
		$shopCartModel = new ShopCart();
		$orderModel = new Order();

		$carts = $shopCartModel->findCarByOrderId($id);
		$order = $orderModel->findOrderById($id);
		$this->assign("carts", $carts);
		$this->assign("order", $order);
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


	public function delBookById() {
		$id = I("id");
		$cookieUtil = new CookieUtil();
		$cookieUtil->delByBookId($id);		
		$this->ajaxReturn(true);
	}


	public function cancalOrder() {
		$id = I("id");

		$orderModel = new Order();
		$orderModel->changeOrderState($id, 2);

		$this->redirect("/Home/Main/order", array('id' => $id));
	}


	public function finishOrder() {
		$id = I("id");

		$orderModel = new Order();
		$orderModel->changeOrderState($id, 5);

		$this->redirect("/Home/Main/order", array('id' => $id));
	}



	
}
