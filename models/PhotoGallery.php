<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo_gallery".
 *
 * @property integer $photo_gallery_id
 * @property string $filename
 * @property string $title
 * @property string $created_date
 * @property integer $active
 */
class PhotoGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_gallery';
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
            'photo_gallery_id' => 'Photo Gallery ID',
            'filename' => 'Filename',
            'title' => 'Title',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return PhotoGalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhotoGalleryQuery(get_called_class());
    }
}
