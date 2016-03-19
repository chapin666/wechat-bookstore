<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Attachment;


class AttachmentController extends Controller {


	/***
	* 实现图片上传
	*/
	public function uploadImage($img){
		import('@.ORG.UploadFile');

		//导入上传类
		$upload = new \Think\Upload();
		//设置上传文件大小
		$upload->maxSize	=	3292200;
		//设置上传文件类型
		$upload->allowExts	=	explode(',', 'jpg,gif,png,jpeg');
		//设置附件上传目录
		$upload->savePath	=	'./categorys/';
		//设置需要生成缩略图，仅对图像文件有效
		$upload->thumb	=	true;
		// 设置引用图片类库包路径
		$upload->imageClassPath     	= 	'@.ORG.Image';
		//设置需要生成缩略图的文件后缀
		$upload->thumbPrefix		= 	'm_,s_';  //生产2张缩略图
		//设置缩略图最大宽度
		$upload->thumbMaxWidth      	=	'400,100';
		//设置缩略图最大高度
		$upload->thumbMaxHeight	=	'400,100';
		//设置上传文件规则
		$upload->saveRule		=	'uniqid';
		//删除原图
		$upload->thumbRemoveOrigin  =	true;


		//如果上传不成功
		$info = $upload->upload();
		if (!$info)
		{
			//捕获上传异常
			$this->error($upload->getError());
		}
		else
		{

/*			//导入图片类
			$image = new \Think\Image(); 

			//给m_缩略图添加水印, Image::water('原文件路径','水印图片地址')
			$image->water($info[upload]['savepath'] . $info[upload]['savename'], 
					APP_PATH . '/Public/images/banner01.png');*/

			//图片名赋值给 字段image
			$img = $info[upload]['savename'];
		}

		
		$attachmentModel = new Attachment;
		//保存当前数据对象
		$data['path']	=	$img;
		$list		=	$attachmentModel ->add($data);
		if ($list !== false)
		{
			return true;
			//$this->success('上传图片成功！');
		}
		else
		{
			return false;
			//$this->error('上传图片失败!');
		}
	}

}
