<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tender_resource".
 *
 * @property integer $tender_resource_id
 * @property integer $tender_id
 * @property string $filename
 * @property integer $active
 * @property string $created_date
 *
 * @property Tender $tender
 */
class TenderResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tender_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tender_id', 'active'], 'integer'],
            [['filename'], 'string'],
            [['created_date'], 'safe'],
            [['tender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tender::className(), 'targetAttribute' => ['tender_id' => 'tender_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tender_resource_id' => 'Tender Resource ID',
            'tender_id' => 'Tender ID',
            'filename' => 'Filename',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTender()
    {
        return $this->hasOne(Tender::className(), ['tender_id' => 'tender_id']);
    }

    /**
     * @inheritdoc
     * @return TenderResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TenderResourceQuery(get_called_class());
    }
}
