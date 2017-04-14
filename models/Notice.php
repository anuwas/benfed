<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property integer $notice_id
 * @property string $notice_title
 * @property string $notice_content
 * @property string $last_date
 * @property integer $active
 * @property integer $archive
 * @property integer $access
 * @property string $created_date
 *
 * @property NoticeResource[] $noticeResources
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notice_title'], 'required'],
            [['notice_content'], 'string'],
            [['last_date', 'created_date'], 'safe'],
            [['active', 'archive', 'access'], 'integer'],
            [['notice_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notice_id' => 'Notice ID',
            'notice_title' => 'Notice Title',
            'notice_content' => 'Notice Content',
            'last_date' => 'Last Date',
            'active' => 'Active',
            'archive' => 'Archive',
            'access' => 'Access',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticeResources()
    {
        return $this->hasMany(NoticeResource::className(), ['notice_id' => 'notice_id']);
    }

    /**
     * @inheritdoc
     * @return NoticeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NoticeQuery(get_called_class());
    }
}
