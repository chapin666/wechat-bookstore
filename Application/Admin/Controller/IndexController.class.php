<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Category;


class IndexController extends Controller {

    
    /* 首页Action */
    public function index(){
       $this->display();
    }


<<<<<<< Updated upstream
        $c = new Category();
=======
    /* 查询所有书籍分类Action*/
    public function category() {
        
        $c = new BookCategory();
>>>>>>> Stashed changes
        $categoryList = $c->findList();
        $this->assign('categorys', $categoryList);
        $this->display();

    }


    /* 书籍列表Action */
    public function book() {
        $this->display();
    }

    /* 订单列表Action */
    public function order() {
	   $this->display();
    }

    /* 用户管理Action */
    public function user() {
	   $this->display();
    }

}
