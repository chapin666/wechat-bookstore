<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Attachment;

class IndexController extends Controller {

     public function index(){
       $this->display();
    }

    public function category() {
        $a = new Attachment();
        $list = $a->getAttachementById(1);

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
