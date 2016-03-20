<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Category;


class CategoryController extends  Controller  {

	public function save() {

		$attachmentCtroller = new AttachmentController;

		// Upload image
		 if(!empty($_FILES))
		 {
		 	$attachment_id = $attachmentCtroller->uploadImage();
		 }

		 // save data to database
		 $data['name'] = $_POST['category-title'];
		 $data['attachment_id'] = $attachment_id;
		 $data['description'] = $_POST['category-description'];
		 
		 $categoryDao = new Category();
		 $categoryDao->save($data);


		$this->ajaxReturn(true);
	}

}