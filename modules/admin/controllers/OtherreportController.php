<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\OtherReport;
use app\models\OtherReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\OtherReportResource;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\OtherReportQuery;
/**
 * OtherReportController implements the CRUD actions for OtherReport model.
 */
class OtherreportController extends Controller
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
     * Lists all OtherReport models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new OtherReportSearch();
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
        $model = new OtherReport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->otherreport_id]);
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
        if (($model = OtherReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
		//echo "test";
    	$this->view->title = 'Admin - Report Pages';
    	$this->layout = 'admin';
    	$model=OtherReport::findAll(['active'=>'1']);
    	return $this->render('report_page_list',['model'=>$model]);
    }
    
    
    public function actionNewpage()
    {
    	$this->view->title = 'Admin - Other Report Pages';
    	$this->layout = 'admin';
    	$model = new OtherReport();
    	
    	if($model->load(Yii::$app->request->post())){
    		$model->page_content=htmlentities($model->page_content);
    		
    		$model->save();
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/otherreport');
    	}else{
    		return $this->render('new_page',['model' => $model,]);
    	}
    	
    }
    
    public function actionUpdate($id)
    {
    	$this->view->title = 'Admin - Update Other Report';
    	$this->layout = 'admin';
    	
    	$model = $this->findModel($id);
    	$model->page_content=html_entity_decode($model->page_content);
    	
    	
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->page_content=htmlentities($model->page_content);
    		
    		$model->save();
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/otherreport');
    	}
    	 else {
    		return $this->render('update_report', ['model' => $model,]);
    		
    	}
    }
    
    public function actionResource(){
    	$this->view->title = 'Admin - Other Report Resource List';
    	$this->layout = 'admin';
    	$model=OtherReportResource::find(['active'=>1])->with('otherreport')->all();
    	return $this->render('otherreport_resource_list',['model'=>$model]);
    }
    
    public function actionResourceadd()
    {
    	$this->view->title = 'Admin - New Resource';
    	$this->layout = 'admin';
    	 
    	$report=OtherReport::findAll(['active'=>1]);
    	$model = new OtherReportResource();
    	$imgmodel = new UploadForm();
    	 
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    			 
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->otherreportUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/otherreport/resource');
    	}else{
    		return $this->render('add_resource',['model' => $model,'otherreport'=>$report]);
    	}
    }
    
    public function actionPagedlete($id)
    {
    	OtherReport::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/otherreport');
    }
    
    public function actionResourcedlete($id)
    {
    	OtherReportResource::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/otherreport/resource');
    }
}
