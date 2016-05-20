<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Category;
use Admin\Model\Book;
use Admin\Model\User;
use Admin\Model\Order;
use Admin\Model\ShopCart;


class IndexController extends Controller {


    // Login page 
    public function index() {
        $message = I("msg") == null ? "微信平台图书销售系统"  : I("msg");

        $this->assign("msg", $message);
        $this->display();
    }

    
    // 首页Action 
    public function main(){

        $categoryModel = new Category;
        $bookModel = new Book;
        $userModel = new User;
        $orderModel = new Order;
        $shopCart = new ShopCart;

        $category_count = $categoryModel->count();
        $book_count = $bookModel->count();
        $user_count = $userModel->count();
        $order_count = $orderModel->count();
        $order_finish_count = $orderModel->getFinishCount() ;
        $order_wait_count = $orderModel->getWaitCount();
        $order_waitsend_count = $orderModel->getWaitSendCount();
        $order_waitpay_count = $orderModel->getWaitPayCount();
        $order_most_user = $orderModel->getMostOrderUser();
        $sell_most_book = $shopCart->findSellMostBook();
        $sell_less_book = $shopCart->findSellLessBook();

        $this->assign('category_count', $category_count);
        $this->assign('book_count', $book_count);
        $this->assign('user_count', $user_count);
        $this->assign('order_count', $order_count);
        $this->assign('order_finish_count',  $order_finish_count);
        $this->assign('order_wait_count', $order_wait_count);
        $this->assign('order_waitsend_count',  $order_waitsend_count);
        $this->assign('order_waitpay_count',  $order_waitpay_count);
        $this->assign('order_most_user', $order_most_user);
        $this->assign('sell_most_book', $sell_most_book);
        $this->assign('sell_less_book', $sell_less_book);

        $this->assign("title", "主页");
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
        $this->assign("title", "图书分类管理");
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
        $this->assign("title", "图书管理");
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
        $this->assign("title", "订单管理");
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
       $this->assign("title", "用户管理");
        $this->display();
    }

}
