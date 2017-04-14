<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;

	public function rules()
	{
		return [
				[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
		];
	}

	public function upload()
	{
		$filename='';
		$rnd  = rand(0,9999);
		/* if ($this->validate()) {
			$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
			$this->imageFile->saveAs('uploads/' . $filename);
			chmod("uploads/".$filename, 775);
			return $filename;
		} else {
			return false;
		} */
		
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/event/' . $filename);
		chmod("uploads/event/".$filename, 775);
		
		
		return $filename;
	}
	
	public function noticeUpload(){
		$filename='';
		$rnd  = rand(0,9999);
		
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/notice/' . $filename);
		chmod("uploads/notice/".$filename, 775);
		
				
		return $filename;
	}
	
	public function cmsUpload(){
		$filename='';
		$rnd  = rand(0,9999);
		
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/cms/' . $filename);
		chmod("uploads/cms/".$filename, 777);
		
				
		return $filename;
	}
	
	public function photogalleryUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/photogallery/' . $filename);
		chmod("uploads/photogallery/".$filename, 777);
	
		return $filename;
	}
	
	public function sliderUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/slider/' . $filename);
		chmod("uploads/slider/".$filename, 777);
	
		return $filename;
	}
	
	public function awardUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/award/' . $filename);
		chmod("uploads/award/".$filename, 777);
	
		return $filename;
	}
	
	public function eventdUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/events/' . $filename);
		chmod("uploads/events/".$filename, 777);
	
		return $filename;
	}
	
	public function societycornerUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/societycorner/' . $filename);
		chmod("uploads/societycorner/".$filename, 777);
	
		return $filename;
	}
	
	public function tenderUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/tender/' . $filename);
		chmod("uploads/tender/".$filename, 777);
	
		return $filename;
	}
	
	public function reportUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/report/' . $filename);
		chmod("uploads/report/".$filename, 777);
	
		return $filename;
	}
	
	public function otherreportUpload(){
		$filename='';
		$rnd  = rand(0,9999);
	
		$filename=$rnd.'_'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
		$this->imageFile->saveAs('uploads/otherreport/' . $filename);
		chmod("uploads/otherreport/".$filename, 777);
	
		return $filename;
	}
}