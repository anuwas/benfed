<?php

namespace app\controllers;

use app\models\Cms;
use app\models\Events;
use app\models\Notice;
use app\models\Tender;
use app\models\Report;
use app\models\OtherReport;
use app\models\SocietyCorner;

class CmsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
	public function actionWhoweare(){
	$this->view->title = 'BENFED - Who we are';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'who_we_are']);
	return $this->render('cms',['model'=>$model]);
	}
	
	
	public function actionMissionvision(){
	$this->view->title = 'BENFED - Mission Vision';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'mission-vision']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionOrganizationalstructure(){
	$this->view->title = 'BENFED - ORGANIZATIONAL STRUCTURE';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'organizational-structure']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionMembers(){
	$this->view->title = 'BENFED - Members';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'members']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionBranchoffice(){
	$this->view->title = 'BENFED - Branch Office<';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'branch-office']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionColdstorageunit(){
	$this->view->title = 'BENFED - Cold Storage Unit';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'cold-storage-unit']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionSalescentre(){
	$this->view->title = 'BENFED - Sales Centre';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'sales-centre']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionStorage(){
	$this->view->title = 'BENFED - Storage';
	$this->layout = 'cms';
	//return $this->render('storage');
	$model=Cms::findOne(['page_name'=>'storage']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionMd(){
	$this->view->title = 'BENFED - MD';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'md']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionMarketingprocurement()
	{
	$this->view->title = 'BENFED - Marketing Procurement';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'Marketing_Procurement']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionFertilizer()
	{
	$this->view->title = 'BENFED - Fertilizer';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'Fertilizer']);
	return $this->render('cms',['model'=>$model]);
	}
	
	public function actionEngineering()
	{
		$this->view->title = 'BENFED - Engineering';
		$this->layout = 'cms';
		$model=Cms::findOne(['page_name'=>'Engineering']);
		return $this->render('cms',['model'=>$model]);
	}
	
	public function actionInput()
	{
	$this->view->title = 'BENFED - Input';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'input']);
	return $this->render('cms',['model'=>$model]);
	}
	
	
	
	public function actionPlanningdevelopment()
	{
	$this->view->title = 'BENFED - Planning & Development';
	$this->layout = 'cms';
	$model=Cms::findOne(['page_name'=>'planning-development']);
	return $this->render('cms',['model'=>$model]);
	}
	
	
	public function actionGeneralreportspublication()
	{
	$this->view->title = 'BENFED - General Reports & publication';
	$this->layout = 'cms';
	$report=Report::find(['page_name'=>'general-reports-publication'])->with('reportResources')->one();
	return $this->render('general-reports-publication',['model'=>$report]);	
	}
	
	public function actionByelaw()
	{
	$this->view->title = 'BENFED - Bye Laws';
	$this->layout = 'cms';
	$report=Report::find()->joinWith('reportResources')->where(['page_name'=>'bye-law'])->one();
	return $this->render('report',['model'=>$report]);	
	}
	
	public function actionFinancialreport()
	{
	$this->view->title = 'BENFED - Financial Report';
	$this->layout = 'cms';
	$report=Report::find()->joinWith('reportResources')->where(['page_name'=>'financial-report'])->one();
	return $this->render('report',['model'=>$report]);	
	}
	
	
	
	public function actionFinancial()
	{
	$this->view->title = 'BENFED - Financial';
	$this->layout = 'cms';
	return $this->render('financial');
	}
	
	public function actionFutureplan()
	{
	$this->view->title = 'BENFED - Future Plans';
	$this->layout = 'cms';
	return $this->render('future-plan');
	}
	
	public function actionSocietycorner()
	{
	$this->view->title = 'BENFED - Society Corner';
	$this->layout = 'cms';
	$model=SocietyCorner::findAll(['active'=>1]);
	return $this->render('society-corner',['model'=>$model]);
	}
	
	public function actionEvent()
	{
	$this->view->title = 'BENFED - Events';
	$model=Events::findAll(['active'=>1]);
	$this->layout = 'cms';
	return $this->render('event',['model'=>$model]);
	}
	
	public function actionNotice()
	{
	$this->view->title = 'BENFED - Notice';
	$this->layout = 'cms';
	$session=\Yii::$app->session;
	
	if(!isset($session['loggedUser'])){
		$notice = Notice::find()->joinWith('noticeResources')->where(['notice.active'=>1,'access'=>0])->all();
	}else if($session['loggedUser']==''){
		$notice = Notice::find()->joinWith('noticeResources')->where(['notice.active'=>1,'access'=>0])->all();
	}else{
		$notice = Notice::find()->joinWith('noticeResources')->where(['notice.active'=>1,'access'=>1])->all();
	}
	
	//$notice=Notice::find(['active'=>1])->with('noticeResources')->all();
	
	return $this->render('notice',['model'=>$notice]);
	}
	
	public function actionTender()
	{
	$this->view->title = 'BENFED - Tenders';
	$this->layout = 'cms';
	$tender=Tender::find(['active'=>1])->with('tenderResources')->all();
	return $this->render('tender',['model'=>$tender]);
	}
	
	public function actionOtherreport()
	{
	$this->view->title = 'BENFED - Other Reports';
	$this->layout = 'cms';
	$otherreport=OtherReport::find()->joinWith('otherreportResources')->where(['otherreport.active'=>1])->all();
	
	return $this->render('other-report',['model'=>$otherreport]);	
	}
}