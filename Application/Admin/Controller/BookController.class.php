<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Book;


class BookController extends  Controller  {


	public function save() {
		$attachmentCtroller = new AttachmentController;

		// Upload image
		 if(!empty($_FILES))
		 {
		 	$attachment_id = $attachmentCtroller->uploadImage('books');
		 }


		 $data['name'] = $_POST['book-name'];


		 $bookDao = new Book();
		 $bookDao->save($data);


		$this->ajaxReturn(true);

	}

}