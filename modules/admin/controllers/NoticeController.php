<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Notice;
use app\models\NoticeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\imagine\Image;
use Imagine\Image\Box;
use app\models\NoticeQuery;
use app\models\NoticeResource;

/**
 * NoticeController implements the CRUD actions for Notice model.
 */
class NoticeController extends Controller
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
     * Lists all Notice models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new NoticeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notice model.
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
     * Creates a new Notice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->notice_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Notice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->notice_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/benfed/admin/notice');
    }

    /**
     * Finds the Notice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - Notice';
    	$this->layout = 'admin';
    	$model=Notice::findAll(['active'=>'1']);
    	return $this->render('notice_list',['model'=>$model]);
    }
    public function actionAdd()
    {
    	$this->view->title = 'Admin - New Notice';
    	$this->layout = 'admin';
    	
    	$model = new Notice();
    	
    	if($model->load(Yii::$app->request->post())){
    		$model->notice_content=htmlentities($model->notice_content);
    		$model->save();
    			
    		return $this->redirect('/benfed/admin/notice');
    	}else{
    		return $this->render('add_notice',['model' => $model,]);
    	}
    }
    
    public function actionUpdate($id)
    {
    	$this->view->title = 'Admin - Update Notice';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->notice_content=html_entity_decode($model->notice_content);
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->notice_content=htmlentities($model->notice_content);
    		$model->save();
    		return $this->redirect('/benfed/admin/notice');
    	}
    		
    	 else {
    		return $this->render('update_notice', ['model' => $model,]);
    		
    	}
    }
    
    public function actionResource()
    {
    	$this->view->title = 'Admin - NoticeResource';
    	$this->layout = 'admin';
    	$model=NoticeResource::find(['active'=>1])->with('notice')->all();
    	return $this->render('notice_resource_list',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Notice';
    	$this->layout = 'admin';
    	
    	$notices=Notice::findAll(['active'=>1]);
    	$model = new NoticeResource();
    	$imgmodel = new UploadForm();
    	
    	if($model->load(Yii::$app->request->post())){
    		
    	$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		 if($uploadedfile){
    	
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->noticeUpload();
    			$model->filename=$filename;
    		}
    		
    		$model->save();
    		
    			
    			return $this->redirect('/benfed/admin/notice/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model,'notices'=>$notices]);
    	}
    }
}
