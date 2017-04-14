<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Cms;
use app\models\CmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CmsResource;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * CmsController implements the CRUD actions for Cms model.
 */
class CmsController extends Controller
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
     * Lists all Cms models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new CmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cms model.
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
     * Creates a new Cms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cms();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cms_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cms_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
 */
    /**
     * Deletes an existing Cms model.
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
     * Finds the Cms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - CMS Pages';
    	$this->layout = 'admin';
    	$model=Cms::findAll(['active'=>'1']);
    	return $this->render('cms_page_list',['model'=>$model]);
    }
    
    
    public function actionNewpage()
    {
    	$this->view->title = 'Admin - CMS Pages';
    	$this->layout = 'admin';
    	$model = new Cms();
    	
    	if($model->load(Yii::$app->request->post())){
    		$model->page_content=htmlentities($model->page_content);
    		$model->content_snippet=htmlentities($model->content_snippet);
    		$model->save();
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/cms');
    	}else{
    		return $this->render('new_page',['model' => $model,]);
    	}
    	
    }
    
    public function actionUpdate($id)
    {
    	$this->view->title = 'Admin - Update CMS';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->page_content=html_entity_decode($model->page_content);
    	$model->content_snippet=html_entity_decode($model->content_snippet);
    	
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->page_content=htmlentities($model->page_content);
    		$model->content_snippet=htmlentities($model->content_snippet);
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/cms');
    	}
    		
    	 else {
    		return $this->render('update_cms', ['model' => $model,]);
    		
    	}
    }
    
    public function actionResource(){
    	
    	$this->view->title = 'Admin - CMS Resource List';
    	$this->layout = 'admin';
    	$model=CmsResource::find(['active'=>1])->with('cms')->all();
    	return $this->render('cms_resource_list',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Notice';
    	$this->layout = 'admin';
    	 
    	$cms=Cms::findAll(['active'=>1]);
    	$model = new CmsResource();
    	$imgmodel = new UploadForm();
    	 
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    			 
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->cmsUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/cms/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model,'cms'=>$cms]);
    	}
    }
    
    public function actionPagedlete($id)
    {
    	Cms::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/cms');
    }
    
    public function actionResourcedlete($id)
    {
    	CmsResource::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/cms/resource');
    }
}
