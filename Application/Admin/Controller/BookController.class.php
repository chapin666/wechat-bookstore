<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Book;
use Admin\Model\Category;


class BookController extends  Controller  {


	// 查询book列表
	public function findAll() {
	     $this->redirect('/Admin/Index/book');
	}

	// 保存书籍
	public function save() {

		 $data['name'] = $_POST['book-name'];
		 $data['book_category_id'] = $_POST['book-category-name'];
		 $data['author'] = $_POST['author'];
		 $data['press'] = $_POST['publish'];
		 $data['price'] = $_POST['price'];
		 $data['price_now'] = $_POST['price-now'];
		 $data['publish_time'] =  date("Y-m-d H:i:s");
		 $data['create_time'] = date("Y-m-d H:i:s");
		 $data['total_count'] = $_POST['book-total'];
		 $data['sell_count'] = 0; 
		 $data['click_count'] = 0;
		 $data['description'] = $_POST['content'];
		 $data['is_discount'] = $_POST['is-discount'] ? 1 : 0;

		
		
		 $bookModel = new Book();
		 $attachmentCtroller = new AttachmentController;
		 $attachment_id = "1";


		  // 如果文件存在
		 if(!empty($_FILES['upload']['name'])) {

			$attachment_id = $attachmentCtroller->uploadImage('books');
			$data['attachment_id'] = $attachment_id;


			// Upload image
			if (isset($_POST['book-id']) && !empty($_POST['book-id'])) { //update
				$data['id'] =  $_POST['book-id'];
				$bookModel->save($data);
			} else {
				$bookModel->add($data);
			}

		} else {  // Add
			$bookModel->add($data);
		}

		$this->findAll();
	}


	// update 
	public function update() {
		$id = I('id');

		$bookModel = new Book();
		$book = $bookModel->findBookById($id);

		$categoryModel = new Category();
		$categorys = $categoryModel->findAll();

		$this->assign('categorys', $categorys);
		$this->assign('book', $book);
		$this->display('/Index/bookAdd'); 
	}


	//delete 
	public function delete() {
		$id = I('id');

		$bookModel = new Book();
		$bookModel->delete($id); 

		 $this->findAll();
	} 


}