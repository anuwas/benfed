<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $event_id
 * @property string $title
 * @property string $page_content
 * @property string $content_snippet
 * @property string $created_date
 * @property integer $active
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'active'], 'required'],
            [['page_content', 'content_snippet'], 'string'],
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
            'event_id' => 'Event ID',
            'title' => 'Title',
            'page_content' => 'Page Content',
            'content_snippet' => 'Content Snippet',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return EventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventsQuery(get_called_class());
    }
}
