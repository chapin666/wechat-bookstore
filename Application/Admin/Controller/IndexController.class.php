<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Category;
use Admin\Model\Book;
use Admin\Model\User;
use Admin\Model\Order;


class IndexController extends Controller {


    // Login page 
    public function login() {
        $this->display();
    }

    
    // 首页Action 
    public function index(){

        $categoryModel = new Category;
        $bookModel = new Book;
        $userModel = new User;
        $orderModel = new Order;

        $category_count = $categoryModel->count();
        $book_count = $bookModel->count();
        $user_count = $userModel->count();
        $order_count = $orderModel->count();

        $this->assign('category_count', $category_count);
        $this->assign('book_count', $book_count);
        $this->assign('user_count', $user_count);
        $this->assign('order_count', $order_count);


        $this->display();
    }


    // 查询所有书籍分类Action
    public function category() {

        $categoryModel = new Category();
        $count = $categoryModel->count();
        $p = getpage($count);
        $list = $categoryModel->findLimit($p->firstRow, $p->listRows);

        $this->assign('categorys', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }



    // 书籍列表Action
    public function book() {

        $bookModel = new Book();
        $count = $bookModel->count();
        $p = getpage($count);
        $books = $bookModel->findLimit($p->firstRow, $p->listRows);   

        $this->assign('books',  $books);
        $this->assign('page', $p->show()); // 赋值分页输出
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
        $orderModel = new Order();
        $count = $orderModel->count();
        $p = getpage($count);
        $orders = $orderModel->findLimit($p->firstRow, $p->listRows);


        $this->assign("orders", $orders);
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }


    // 用户管理Action
    public function user() {
        $userModel = new User();
        $count = $userModel->count();
        $p = getpage($count);
        $users = $userModel->findLimit($p->firstRow, $p->listRows);

        $this->assign("users", $users);
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }
    

}
