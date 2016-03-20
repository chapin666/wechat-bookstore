<?php
namespace  Admin\Model;

class Attachment {


	/* Insert data */
	public function add($data) {
		$model = M("attachment"); 
		return $model->add($data);
	}

	public function getAttachmentById($attachment) {
		$model = M("attachment"); 
		return $model->where($attachment)->select();
	}




}
