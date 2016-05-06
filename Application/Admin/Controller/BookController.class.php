<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Book;
use Admin\Model\Category;


class BookController extends  Controller  {


	public function save() {
		$attachmentCtroller = new AttachmentController;
		$attachment_id = "";

		// Upload image
		 if(!empty($_FILES))
		 {
		 	$attachment_id = $attachmentCtroller->uploadImage('books');
		 }

		 $data['attachment_id'] = $attachment_id;
	
		 $data['name'] = $_POST['book-name'];
		 $data['type'] = $_POST['book-category-name'];
		 $data['author'] = $_POST['author'];
		 $data['press'] = $_POST['publish'];
		 $data['price'] = $_POST['price'];
		 $data['price_now'] = $_POST['price-now'];
		 $data['publish_time'] = time();
		 $data['create_time'] = time();
		 $data['total_count'] = $_POST['book-total'];
		 $data['sell_count'] = 0; 
		 $data['click_count'] = 0;
		 $data['description'] = $_POST['content'];
		 $data['is_discount'] = $_POST['is-discount'] ? 1 : 0;

		 $categoryDao = new Category();
		 $categoryModel = $categoryDao->findCategoryByName($_POST['book-category-name']);
		 $data['book_category_id']  = $categoryModel->id;
		 $bookDao = new Book();
		 $bookDao->save($data);


		$this->ajaxReturn(true);

	}



}