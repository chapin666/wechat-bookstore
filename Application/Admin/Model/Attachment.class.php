<?php
namespace  Admin\Model;

class Attachment {


	/* Insert data */
	public function add($data) {
		$model = M("attachment"); 
		return $model->add($data);
	}

	public function getAttachementById($attachement) {
		$model = M("attachment"); 
		$attachmentModel = $model->where($attachment)->select();
		return $model->parseFieldsMap($attachmentModel);
	}




}
