<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "society_corner".
 *
 * @property integer $society_corner_id
 * @property string $title
 * @property string $filename
 * @property integer $active
 * @property string $created_date
 */
class SocietyCorner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'society_corner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename'], 'string'],
            [['active'], 'integer'],
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
            'society_corner_id' => 'Society Corner ID',
            'title' => 'Title',
            'filename' => 'Filename',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @inheritdoc
     * @return SocietyCornerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SocietyCornerQuery(get_called_class());
    }
}
