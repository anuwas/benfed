<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "awards".
 *
 * @property integer $award_id
 * @property string $filename
 * @property string $title
 * @property string $heading
 * @property string $description
 * @property integer $active
 * @property string $created_date
 */
class Awards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'awards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'description'], 'string'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['title', 'heading'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'award_id' => 'Award ID',
            'filename' => 'Filename',
            'title' => 'Title',
            'heading' => 'Heading',
            'description' => 'Description',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @inheritdoc
     * @return AwardsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AwardsQuery(get_called_class());
    }
}
