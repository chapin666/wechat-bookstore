<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Category;


class CategoryController extends  Controller  {

	// 保存分类
	public function save() {

		$attachmentCtroller = new AttachmentController;

		// Upload image
		if(!empty($_FILES)) {
			$attachment_id = $attachmentCtroller->uploadImage('categorys');
		}

		// save data to database
		$data['name'] = $_POST['title'];
		$data['attachment_id'] = $attachment_id;
		$data['description'] = $_POST['description'];

		$categoryModel = new Category();
		$categoryModel->save($data);

		$this->findAll();
	}


	// 查询分类列表
	public function findAll() {
	        	$this->redirect('/Admin/Index/category');
	}


	// 通过ID删除分类
	public function delete() {
		$id = I('id');
        		$categoryModel = new Category();
		$result = $categoryModel->deleteById($id);
		$this->findAll();
	}

}