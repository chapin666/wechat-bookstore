<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Category;


class CategoryController extends  Controller  {

	// 保存分类
	public function add() {

		$attachmentCtroller = new AttachmentController;
		// Upload image
		if(!empty($_FILES['upload']['name'])) {
			$attachment_id = $attachmentCtroller->uploadImage('categorys');
		}

		// save data to database
		$data['name'] = $_POST['title'];
		$data['attachment_id'] = ($attachment_id == null) ? 1 : $attachment_id;
		$data['description'] = $_POST['description'];

		$categoryModel = new Category();
		$categoryModel->add($data);

		$this->findAll();
	}


               // 修改图书分类实体
	public function put() {

		$attachmentCtroller = new AttachmentController;
		
		// Upload image
		if(!empty($_FILES['upload']['name'])) {
			$attachment_id = $attachmentCtroller->uploadImage('categorys');
			$data['attachment_id'] = $attachment_id;
		}

		// save data to database
		$data['id'] = $_POST['id'];
		$data['name'] = $_POST['title'];
		$data['description'] = $_POST['description'];



		$categoryModel = new Category();
		$categoryModel->update($data);

		$this->findAll();
	}


	// 查询分类列表
	public function findAll() {
	     $this->redirect('/Admin/Index/category');
	}



	// 通过ID查询图书分类
	public function findCategoryById() {
	    $id = $_POST['id'];
	    $categoryModel = new Category();
	     return $this->ajaxReturn($categoryModel->findCategoryById($id));
	}



	// 通过ID删除分类
	public function delete() {
		$id = I('id');
        		$categoryModel = new Category();
		$result = $categoryModel->deleteById($id);
		$this->findAll();
	}



}