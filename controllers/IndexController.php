<?php

namespace app\controllers;

use Yii;
use app\models\Slider;
use app\models\PhotoGallery;
use app\models\Awards;
use app\models\Cms;
use app\models\Events;
use app\models\DistrictEmail;
use app\models\SiteUser;
use app\models\Contact;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$this->view->title = 'BENFED';
    	$this->layout = 'index';
    	$slider=Slider::findAll(['active'=>1]);
    	$photogallery=PhotoGallery::findAll(['active'=>1]);
    	$awards=Awards::findAll(['active'=>1]);
    	$marketing=Cms::findOne(['page_name'=>'Marketing_Procurement']);
    	$engeneering=Cms::findOne(['page_name'=>'Engineering']);
    	$fertilizer=Cms::findOne(['page_name'=>'Fertilizer']);
    	$welcome=Cms::findOne(['page_name'=>'Welcome']);
    	$events=Events::findAll(['active'=>1]);
    	
        return $this->render('index',[
        		'slider'=>$slider,
        		'photogallery'=>$photogallery,
        		'awards'=>$awards,
        		'marketing'=>$marketing,
        		'engineering'=>$engeneering,
        		'fertilizer'=>$fertilizer,
        		'welcome'=>$welcome,
        		'events'=>$events,
        ]);
    }
    
	public function actionContact()
	{
		$this->view->title = 'Contact';
		$this->layout = 'contact';
		$districtemail=DistrictEmail::findAll(['active'=>1]);
		$model = new Contact();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//return $this->redirect(['view', 'id' => $model->contact_id]);
			
		} else {
			return $this->render('contact', ['model' => $model,'districtemail'=>$districtemail]);
					
		}
		
	}
	
	
}