<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Category;


class IndexController extends Controller {


    // Login page 
    public function login() {
        $this->display();
    }

    
    // 首页Action 
    public function index(){

       $this->display();
    }


    // 查询所有书籍分类Action
    public function category() {
        $categoryModel = new Category();
        $categorys = $categoryModel->findAll();

        $this->assign('categorys', $categorys);
        $this->display();
    }



    // 书籍列表Action
    public function book() {
        $this->display();
    }



    // 添加图书
    public function bookAdd() {
		$categoryModel = new Category();
        $categorys = $categoryModel->findAll();
        $this->assign('categorys', $categorys);
        $this->display();
    }


	// 订单列表Action
    public function order() {
	   $this->display();
    }


    // 用户管理Action
    public function user() {
	   $this->display();
    }

}
