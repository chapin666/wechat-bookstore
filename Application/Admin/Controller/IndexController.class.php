<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Category;


class IndexController extends Controller {


     public function index(){
       $this->display();
    }

    public function category() {

        $c = new Category();
        $categoryList = $c->findList();
        $this->assign('categorys', $categoryList);
        $this->display();

    }


    public function book() {
        $this->display();
    }

    public function order() {
	$this->display();
    }

    public function user() {
	$this->display();
    }

}
