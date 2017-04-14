<?php
namespace app\components;
use yii\base\Widget;
use app\models\Cms;

class AboutUswidget extends Widget {
	public $message;
public function init(){
	
	$this->message=Cms::findOne(['page_name'=>'aboutus']);
parent::init();
	if($this->message===null) {
	$this->message= array();
	}else{
	$this->message=$this->message;
	}
}
public function run(){
                 
return $this->render('aboutUsWidgetView',['message' => $this->message]);
}
}