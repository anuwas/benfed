<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Tender;
use app\models\TenderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\imagine\Image;
use Imagine\Image\Box;
use app\models\TenderQuery;
use app\models\TenderResource;

/**
 * TenderController implements the CRUD actions for Tender model.
 */
class TenderController extends Controller
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
     * Lists all Tender models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new TenderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tender model.
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
     * Creates a new Tender model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tender();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tender_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tender model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tender_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tender model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/benfed/admin/tender');
    }

    /**
     * Finds the Tender model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tender the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tender::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionIndex()
    {
    	$this->view->title = 'Admin - Tender';
    	$this->layout = 'admin';
    	$model=Tender::findAll(['active'=>'1']);
    	return $this->render('tender_list',['model'=>$model]);
    }
    public function actionAdd()
    {
    	$this->view->title = 'Admin - New Tender';
    	$this->layout = 'admin';
    	
    	$model = new Tender();
    	
    	if($model->load(Yii::$app->request->post())){
    		$model->page_content=htmlentities($model->page_content);
    		$model->save();
    			
    		return $this->redirect('/benfed/admin/tender');
    	}else{
    		return $this->render('add_tender',['model' => $model,]);
    	}
    }
    
    public function actionUpdate($id)
    {
    	$this->view->title = 'Admin - Update Tender';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->page_content=html_entity_decode($model->page_content);
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->page_content=htmlentities($model->page_content);
    		$model->save();
    		return $this->redirect('/benfed/admin/tender');
    	}
    		
    	 else {
    		return $this->render('update_tender', ['model' => $model,]);
    		
    	}
    }
    
    public function actionResource()
    {
    	$this->view->title = 'Admin - Tender Resource';
    	$this->layout = 'admin';
    	$model=TenderResource::find(['active'=>1])->with('tender')->all();
    	return $this->render('tender_resource_list',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Tender';
    	$this->layout = 'admin';
    	
    	$tenders=Tender::findAll(['active'=>1]);
    	$model = new TenderResource();
    	$imgmodel = new UploadForm();
    	
    	if($model->load(Yii::$app->request->post())){
    		
    	$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		 if($uploadedfile){
    	
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->tenderUpload();
    			$model->filename=$filename;
    		}
    		
    		$model->save();
    		
    			
    			return $this->redirect('/benfed/admin/tender/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model,'tenders'=>$tenders]);
    	}
    }
 }

