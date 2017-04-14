<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Events;
use app\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\EventResource;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->event_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->event_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
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
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - EventPages';
    	$this->layout = 'admin';
    	$model=Events::findAll(['active'=>'1']);
    	return $this->render('index',['model'=>$model]);
    }
    
    public function actionAdd()
    {
    	$this->view->title = 'Admin - Events Pages';
    	$this->layout = 'admin';
    	$model = new Events();
    	 
    	if($model->load(Yii::$app->request->post())){
    		$model->page_content=htmlentities($model->page_content);
    		$model->content_snippet=htmlentities($model->content_snippet);
    		$model->save();
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/events');
    	}else{
    		return $this->render('add',['model' => $model,]);
    	}
    	 
    }
    
    public function actionEdit($id)
    {
    	$this->view->title = 'Admin - Update EVENT';
    	$this->layout = 'admin';
    	 
    	$model = $this->findModel($id);
    	$model->page_content=html_entity_decode($model->page_content);
    	$model->content_snippet=html_entity_decode($model->content_snippet);
    	 
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->page_content=htmlentities($model->page_content);
    		$model->content_snippet=htmlentities($model->content_snippet);
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/events');
    	}
    
    	else {
    		return $this->render('edit', ['model' => $model,]);
    
    	}
    }
    
    public function actionDelevent($id){
    	Events::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/events');
    }
    
    public function actionResource(){
    	 
    	$this->view->title = 'Admin - Event Resource List';
    	$this->layout = 'admin';
    	$model=EventResource::find(['active'=>1])->all();
    	return $this->render('resource',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Resource';
    	$this->layout = 'admin';
    
    	
    	$model = new EventResource();
    	$imgmodel = new UploadForm();
    
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->eventdUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/events/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model]);
    	}
    }
    
    public function actionDeleventresource($id){
    	EventResource::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/events');
    }
}
