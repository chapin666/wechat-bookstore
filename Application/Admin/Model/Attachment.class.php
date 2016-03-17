<?php
namespace  Admin\Model;

class Attachment {

	public function getAttachementById($attachement) {
		$a = M("attachment"); 
		$attachmentModel = $a->where($attachment)->select();
		return $a->parseFieldsMap($attachmentModel);
	}

}
