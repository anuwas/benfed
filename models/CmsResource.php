<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_resource".
 *
 * @property integer $cms_resource_id
 * @property integer $cms_id
 * @property string $resourece_title
 * @property string $filename
 * @property string $created_date
 * @property integer $active
 *
 * @property Cms $cms
 */
class CmsResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_id'], 'required'],
            [['cms_id', 'active'], 'integer'],
            [['filename'], 'string'],
            [['created_date'], 'safe'],
            [['resourece_title'], 'string', 'max' => 145],
            [['cms_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cms::className(), 'targetAttribute' => ['cms_id' => 'cms_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_resource_id' => 'Cms Resource ID',
            'cms_id' => 'Cms ID',
            'resourece_title' => 'Resourece Title',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCms()
    {
        return $this->hasOne(Cms::className(), ['cms_id' => 'cms_id']);
    }

    /**
     * @inheritdoc
     * @return CmsResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CmsResourceQuery(get_called_class());
    }
}
