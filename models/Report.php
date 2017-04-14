<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property integer $report_id
 * @property string $page_name
 * @property string $page_title
 * @property string $page_content
 * @property string $created_date
 * @property integer $active
 *
 * @property ReportResource[] $reportResources
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'page_name', 'page_title', 'page_content'], 'required'],
            [['report_id', 'active'], 'integer'],
            [['page_content'], 'string'],
            [['created_date'], 'safe'],
            [['page_name', 'page_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => 'Report ID',
            'page_name' => 'Page Name',
            'page_title' => 'Page Title',
            'page_content' => 'Page Content',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportResources()
    {
        return $this->hasMany(ReportResource::className(), ['report_id' => 'report_id']);
    }

    /**
     * @inheritdoc
     * @return ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportQuery(get_called_class());
    }
}
