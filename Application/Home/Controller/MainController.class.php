<?php
namespace Home\Controller;

use Think\Controller;
use Admin\Model\Category;
use Admin\Model\Book;

class MainController extends Controller {


	public function index() {
		$category = new Category();
		$categorys = $category->findAll();

		$this->assign('categorys', $categorys);
		$this->display();
	}


	public function category() {
		$this->display();
	}


	public function bookList() {
		$id = I('id');
		$bookModel = new Book();

		$books = $bookModel->findBookByCategoryId($id);

		$this->assign("books",  $books);
		$this->display();
	}


	
	public function cart() {
		$this->display();
	}

	public function user() {
		$this->display();
	}


	public function book() {
		$this->display();
	}

	public function address() {
		$this->display();
	}

	public function orderList() {
		$this->display();
	}

	public function order() {
		$this->display();
	}
	
}
