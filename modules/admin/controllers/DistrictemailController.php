<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\DistrictEmail;
use app\models\DistrictEmailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;

/**
 * DistrictemailController implements the CRUD actions for DistrictEmail model.
 */
class DistrictemailController extends Controller
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
     * Lists all Districtemail models.
     * @return mixed
    
    public function actionIndex()
    {
        $searchModel = new DistrictemailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Districtemail model.
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
     * Creates a new Districtemail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DistrictEmail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Districtemail_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Districtemail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Districtemail_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Districtemail model.
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
     * Finds the Districtemail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Districtemail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DistrictEmail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 public function actionIndex()
    {
    	$this->view->title = 'Admin - District Email';
    	$this->layout = 'admin';
    	$model=DistrictEmail::find(['active'=>1])->all();
    	return $this->render('districtemail_list',['model'=>$model]);
    }
	
	 public function actionAdd()
    {
    	$this->view->title = 'Admin - New Email';
    	$this->layout = 'admin';
    
    	$model = new DistrictEmail();
    	
    
    	if($model->load(Yii::$app->request->post())){
    
    		$model->save();
    
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/districtemail');
    	}else{
    		return $this->render('new_email',['model' => $model]);
    	}
    }
	
	
	 public function actionUpdateemail($id)
    {
    	$this->view->title = 'Admin - Update Email';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->district_email=html_entity_decode($model->district_email);
    	$model->district_name=html_entity_decode($model->district_name);
    	
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->district_email=htmlentities($model->district_email);
    		$model->district_name=htmlentities($model->district_name);
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/districtemail');
    	}
    		
    	 else {
    		return $this->render('update_email', ['model' => $model,]);
    		
    	}
    }
	
	public function actionDeleteemail($id)
    {
    	DistrictEmail::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/districtemail');
    }
}
