<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\BookCategory;


class IndexController extends Controller {


     public function index(){
       $this->display();
    }

    public function category() {

        $c = new BookCategory();
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
