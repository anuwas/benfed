<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\SocietyCorner;
use app\models\SocietyCornerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * SocietyCornerController implements the CRUD actions for SocietyCorner model.
 */
class SocietycornerController extends Controller
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
     * Lists all SocietyCorner models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new SocietyCornerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SocietyCorner model.
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
     * Creates a new SocietyCorner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SocietyCorner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->society_corner_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SocietyCorner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->society_corner_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SocietyCorner model.
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
     * Finds the SocietyCorner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SocietyCorner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SocietyCorner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - Society Corner';
    	$this->layout = 'admin';
    	$model=SocietyCorner::find(['active'=>1])->all();
    	return $this->render('index',['model'=>$model]);
    }
    
    public function actionAdd()
    {
    	$this->view->title = 'Admin - New Resource';
    	$this->layout = 'admin';
    
    	$model = new SocietyCorner();
    	$imgmodel = new UploadForm();
    
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->societycornerUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/societycorner');
    	}else{
    		return $this->render('add',['model' => $model]);
    	}
    }
    
    public function actionDeletesocietycorner($id)
    {
    	SocietyCorner::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/societycorner');
    }
}
