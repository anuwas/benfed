<?php

namespace app\controllers;

use Yii;
use app\models\Contact;
use app\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DistrictEmail;

/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

     
    
    public function actionIndex()
    {
    	$this->view->title = 'Contact';
    	$this->layout = 'contact';
    	$districtemail=DistrictEmail::findAll(['active'=>1]);
    	$model = new Contact();
    
    	if ($model->load(Yii::$app->request->post()) ) {
    		if($model->save()){
    			
    			$this->Mailsend($model->message, $model->districtemail_id);
    			$message="success";
    			return $this->redirect(Yii::$app->homeUrl.'contact?status=success');
    		}else{
    			$message="fail";
    			return $this->redirect(Yii::$app->homeUrl.'contact?status=fail');
    		}
    		
    	} else {
    		$message='';
    		return $this->render('contact', ['model' => $model,'districtemail'=>$districtemail]);
    			
    	}
    
    }
    
    private function Mailsend($message,$districtid){
    	$districtemail=DistrictEmail::findOne(['districtemail_id'=>$districtid]);
    	//$to = $districtemail->district_email;
    	$to='vishal.jaiswal@indware.com';
    	
    	
    	$subject = "Benfed Contact Message";
    	$txt = $message;
    	$headers = "From: info@indware.com" . "\r\n" .
    			"CC: anupam.b@indware.com";
    	
    	
    	mail($to,$subject,$txt,$headers);
    }
    
    public function actionTestmail(){
    	echo ("aaa");
    	
    }
}
