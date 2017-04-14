<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\PhotoGallery;
use app\models\PhotoGallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * PhotogalleryController implements the CRUD actions for PhotoGallery model.
 */
class PhotogalleryController extends Controller
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
     * Lists all PhotoGallery models.
     * @return mixed
     
    public function actionIndex()
    {
        $searchModel = new PhotoGallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
*/
    /**
     * Displays a single PhotoGallery model.
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
     * Creates a new PhotoGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhotoGallery();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->photo_gallery_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PhotoGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->photo_gallery_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhotoGallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    

    /**
     * Finds the PhotoGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhotoGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhotoGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndex()
    {
    	$this->view->title = 'Admin - Photo Gallery';
    	$this->layout = 'admin';
    	$model=PhotoGallery::find(['active'=>1])->all();
    	return $this->render('index',['model'=>$model]);
    }
    
    public function actionAdd()
    {
    	$this->view->title = 'Admin - New Resource';
    	$this->layout = 'admin';
    
    	$model = new PhotoGallery();
    	$imgmodel = new UploadForm();
    
    	if($model->load(Yii::$app->request->post())){
    
    		$uploadedfile = UploadedFile::getInstance($imgmodel, 'resource');
    		if($uploadedfile){
    
    			$imgmodel->imageFile=$uploadedfile;
    			$filename=$imgmodel->photogalleryUpload();
    			$model->filename=$filename;
    		}
    
    		$model->save();
    
    		 
    		return $this->redirect(Yii::$app->request->baseUrl.'/admin/photogallery');
    	}else{
    		return $this->render('create',['model' => $model]);
    	}
    }
    
    public function actionDeletegallery($id)
    {
    	PhotoGallery::findOne($id)->delete();
    	return $this->redirect(Yii::$app->request->baseUrl.'/admin/photogallery');
    }
}
