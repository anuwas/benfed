<?php

namespace app\controllers;

use Yii;
use app\models\SiteUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * SiteuserController implements the CRUD actions for SiteUser model.
 */
class SiteuserController extends Controller
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


    protected function findModel($id)
    {
        if (($model = SiteUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionLogin()
    {
    	$this->view->title = 'Login';
    	$this->layout = 'contact';
    
    	$model = new SiteUser();
    
    	if ($model->load(Yii::$app->request->post())) {
    		$input=Yii::$app->request->post();
    		$dbuser=SiteUser::findOne(['siteuser_email'=>$model->siteuser_email]);
    		if($model->siteuser_password==$dbuser->siteuser_password){
    			$session = new Session();
    			$session->open();
    			$session['loggedUser']=$dbuser;
    			return $this->redirect(Yii::$app->homeUrl);
    		}else{
    			
    		}
    		return $this->render('login', ['model' => $model,]);
    	} else {
    		return $this->render('login', ['model' => $model,]);
    		
    	}
    }
    
    public function actionLogout(){
    	$session = new Session();
    	$session->open();
    	$session['loggedUser']='';
    	return $this->redirect(Yii::$app->homeUrl);
    }
}
