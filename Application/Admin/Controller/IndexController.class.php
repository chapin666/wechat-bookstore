<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
     public function index(){
       $this->display();
    }

    public function category() {
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
