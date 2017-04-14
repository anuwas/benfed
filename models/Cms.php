<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms".
 *
 * @property integer $cms_id
 * @property string $page_name
 * @property string $page_title
 * @property string $page_content
 * @property string $content_snippet
 * @property string $created_date
 * @property integer $active
 *
 * @property CmsResource[] $cmsResources
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_name', 'page_title'], 'required'],
            [['page_content', 'content_snippet'], 'string'],
            [['created_date'], 'safe'],
            [['active'], 'integer'],
            [['page_name'], 'string', 'max' => 45],
            [['page_title'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_id' => 'Cms ID',
            'page_name' => 'Page Name',
            'page_title' => 'Page Title',
            'page_content' => 'Page Content',
            'content_snippet' => 'Content Snippet',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsResources()
    {
        return $this->hasMany(CmsResource::className(), ['cms_id' => 'cms_id']);
    }

    /**
     * @inheritdoc
     * @return CmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CmsQuery(get_called_class());
    }
}
