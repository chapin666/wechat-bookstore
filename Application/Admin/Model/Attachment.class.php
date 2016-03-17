<?php 


class Attachment {
	
		public function getAttachementById($id) {
			$Attachment = M("attachment"); // 实例化User对象
			return $Attachment->where('id=$id')->select();
		}

}
