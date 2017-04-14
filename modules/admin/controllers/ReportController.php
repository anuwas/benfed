<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Report;
use app\models\ReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ReportResource;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportController extends Controller
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
     * Lists all Report models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Report model.
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
     * Creates a new report model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new report();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->report_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing report model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->report_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
 */
    /**
     * Deletes an existing report model.
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
     * Finds the report model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return report the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = report::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - report Pages';
    	$this->layout = 'admin';
    	$model=report::findAll(['active'=>'1']);
    	return $this->render('report_page_list',['model'=>$model]);
    }
    
    
    public function actionNewpage()
    {
    	$this->view->title = 'Admin - Report Pages';
    	$this->layout = 'admin';
    	$model = new report();
    	
    	if($model->load(Yii::$app->request->post())){
    		$model->page_content=htmlentities($model->page_content);
    		
    		$model->save();
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/report');
    	}else{
    		return $this->render('new_page',['model' => $model,]);
    	}
    	
    }
    
    public function actionUpdate($id)
    {
    	$this->view->title = 'Admin - Update Report';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->page_content=html_entity_decode($model->page_content);
    	
    	
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->page_content=htmlentities($model->page_content);
    		
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/report');
    	}
    		
    	 else {
    		return $this->render('update_report', ['model' => $model,]);
    		
    	}
    }
    
    public function actionResource(){
    	
    	$this->view->title = 'Admin - Report Resource List';
    	$this->layout = 'admin';
    	$model=ReportResource::find(['active'=>1])->with('report')->all();
    	return $this->render('report_resource_list',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Resource';
    	$this->layout = 'admin';
    	 
    	$report=Report::findAll(['active'=>1]);
    	$model = new ReportResource();
    	$imgmodel = new UploadForm();
    	 
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    			 
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->reportUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/report/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model,'report'=>$report]);
    	}
    }
    
    public function actionPagedlete($id)
    {
    	report::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/report');
    }
    
    public function actionResourcedlete($id)
    {
    	reportResource::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/report/resource');
    }
}
