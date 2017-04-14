<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "otherreport".
 *
 * @property integer $otherreport_id
 * @property string $title
 * @property string $page_content
 * @property string $created_date
 * @property integer $active
 *
 * @property OtherReportResource[] $otherreportResources
 */
class OtherReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otherreport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['otherreport_id',  'title', 'page_content'], 'required'],
            [['otherreport_id', 'active'], 'integer'],
            [['page_content'], 'string'],
            [['created_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'otherreport_id' => 'Report ID',
            'title' => 'Title',
            'page_content' => 'Page Content',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtherreportResources()
    {
        return $this->hasMany(OtherReportResource::className(), ['otherreport_id' => 'otherreport_id']);
    }

    /**
     * @inheritdoc
     * @return OtherReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OtherReportQuery(get_called_class());
    }
}
