<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\SiteUser;
use app\models\SiteUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;

/**
 * SiteuserController implements the CRUD actions for Siteuser model.
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

    /**
     * Lists all Siteuser models.
     * @return mixed
    
    public function actionIndex()
    {
        $searchModel = new SiteuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Siteuser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Siteuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Siteuser_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Siteuser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Siteuser_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Siteuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Siteuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Siteuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 public function actionIndex()
    {
    	$this->view->title = 'Admin - Site User';
    	$this->layout = 'admin';
    	$model=SiteUser::find(['active'=>1])->all();
    	return $this->render('siteuser_list',['model'=>$model]);
    }
	
	 public function actionAdd()
    {
    	$this->view->title = 'Admin - New User';
    	$this->layout = 'admin';
    
    	$model = new SiteUser();
    	
    
    	if($model->load(Yii::$app->request->post())){
    
    		$model->save();
    
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/siteuser');
    	}else{
    		return $this->render('new_user',['model' => $model]);
    	}
    }
	
	
	 public function actionUpdateuser($id)
    {
    	$this->view->title = 'Admin - Update User';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->siteuser_name=html_entity_decode($model->siteuser_name);
    	$model->siteuser_email=html_entity_decode($model->siteuser_email);
		$model->siteuser_password=html_entity_decode($model->siteuser_password);
    	
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->siteuser_name=htmlentities($model->siteuser_name);
    		$model->siteuser_email=htmlentities($model->siteuser_email);
			$model->siteuser_password=htmlentities($model->siteuser_password);
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/siteuser');
    	}
    		
    	 else {
    		return $this->render('update_user', ['model' => $model,]);
    		
    	}
    }
	
	public function actionDeleteuser($id)
    {
    	Siteuser::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/siteuser');
    }
}
