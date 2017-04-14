<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "otherreport_resource".
 *
 * @property integer $otherreport_resource_id
 * @property integer $otherreport_id
 * @property string $resourece_title
 * @property string $filename
 * @property string $created_date
 * @property integer $active
 *
* @property Otherreport $otherreport
 */
class OtherReportResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otherreport_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['otherreport_id', 'resourece_title', 'filename', 'active'], 'required'],
            [['otherreport_id', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['resourece_title', 'filename'], 'string', 'max' => 255],
            [['otherreport_id'], 'exist', 'skipOnError' => true, 'targetClass' => OtherReport::className(), 'targetAttribute' => ['otherreport_id' => 'otherreport_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'otherreport_resource_id' => 'Report Resource ID',
            'otherreport_id' => 'Report ID',
            'resourece_title' => 'Resourece Title',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtherreport()
    {
        return $this->hasOne(OtherReport::className(), ['otherreport_id' => 'otherreport_id']);
    }

    /**
     * @inheritdoc
     * @return OtherReportResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OtherReportResourceQuery(get_called_class());
    }
}
