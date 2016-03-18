<?php
namespace Admin\Controller;

use Think\Controller;


class CategoryController extends  Controller  {

	public function save() {
		$attachmentCtroller = new AttachmentController;

		$status = false;

		 if(!empty($_FILES))
		 {
		 	$img = $_POST['image'];
		 	$status = $attachmentCtroller->uploadImage($img);
		 }

		$this->ajaxReturn($status);
	}

}