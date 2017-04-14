<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_resource".
 *
 * @property integer $event_resource_id
 * @property string $title
 * @property string $filename
 * @property string $created_date
 * @property integer $active
 */
class EventResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename'], 'string'],
            [['created_date'], 'safe'],
            [['active'], 'integer'],
            [['title'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_resource_id' => 'Event Resource ID',
            'title' => 'Title',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return EventResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventResourceQuery(get_called_class());
    }
}
