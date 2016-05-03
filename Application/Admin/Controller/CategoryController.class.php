<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Category;


class CategoryController extends  Controller  {

    // 保存分类
	public function save() {

		$attachmentCtroller = new AttachmentController;

		// Upload image
		 if(!empty($_FILES))
		 {
		 	$attachment_id = $attachmentCtroller->uploadImage('categorys');
		 }

		 // save data to database
		 $data['name'] = $_POST['category-title'];
		 $data['attachment_id'] = $attachment_id;
		 $data['description'] = $_POST['category-description'];
		 
		 $categoryModel = new Category();
		 $categoryModel->save($data);

		 $this->ajaxReturn(true);
	}


    // 查询分类列表
    public function findAll() {
	     $categoryModel = new Category();
		 $categorys = $categoryModel.findAll();
		 $this->ajaxReturn($categorys);
	}

}