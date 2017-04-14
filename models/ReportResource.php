<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_resource".
 *
 * @property integer $report_resource_id
 * @property integer $report_id
 * @property string $resourece_title
 * @property string $filename
 * @property string $resourece_type
 * @property string $created_date
 * @property integer $active
 *
 * @property Report $report
 */
class ReportResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'resourece_title', 'filename', 'resourece_type', 'active'], 'required'],
            [['report_id', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['resourece_title', 'filename'], 'string', 'max' => 255],
            [['resourece_type'], 'string', 'max' => 45],
            [['report_id'], 'exist', 'skipOnError' => true, 'targetClass' => Report::className(), 'targetAttribute' => ['report_id' => 'report_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_resource_id' => 'Report Resource ID',
            'report_id' => 'Report ID',
            'resourece_title' => 'Resourece Title',
            'filename' => 'Filename',
            'resourece_type' => 'Resourece Type',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(Report::className(), ['report_id' => 'report_id']);
    }

    /**
     * @inheritdoc
     * @return ReportResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportResourceQuery(get_called_class());
    }
}
