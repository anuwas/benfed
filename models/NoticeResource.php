<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notice_resource".
 *
 * @property integer $notice_resource_id
 * @property integer $notice_id
 * @property string $resourece_title
 * @property string $filename
 * @property string $created_date
 * @property integer $active
 *
 * @property Notice $notice
 */
class NoticeResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notice_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notice_id'], 'required'],
            [['notice_id', 'active'], 'integer'],
            [['filename'], 'string'],
            [['created_date'], 'safe'],
            [['resourece_title'], 'string', 'max' => 145],
            [['notice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Notice::className(), 'targetAttribute' => ['notice_id' => 'notice_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notice_resource_id' => 'Notice Resource ID',
            'notice_id' => 'Notice ID',
            'resourece_title' => 'Resourece Title',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotice()
    {
        return $this->hasOne(Notice::className(), ['notice_id' => 'notice_id']);
    }

    /**
     * @inheritdoc
     * @return NoticeResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NoticeResourceQuery(get_called_class());
    }
}
