<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tender".
 *
 * @property integer $tender_id
 * @property string $title
 * @property string $page_content
 * @property integer $active
 * @property integer $archive
 * @property string $created_date
 *
 * @property TenderResource[] $tenderResources
 */
class Tender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_content'], 'string'],
            [['active', 'archive'], 'integer'],
            [['created_date'], 'safe'],
            [['title'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tender_id' => 'Tender ID',
            'title' => 'Title',
            'page_content' => 'Page Content',
            'active' => 'Active',
            'archive' => 'Archive',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenderResources()
    {
        return $this->hasMany(TenderResource::className(), ['tender_id' => 'tender_id']);
    }

    /**
     * @inheritdoc
     * @return TenderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TenderQuery(get_called_class());
    }
}
