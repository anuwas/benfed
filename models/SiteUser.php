<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_user".
 *
 * @property integer $siteuser_id
 * @property string $siteuser_name
 * @property string $siteuser_email
 * @property string $siteuser_password
 * @property integer $active
 * @property string $created_date
 */
class SiteUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteuser_name', 'siteuser_email', 'siteuser_password'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['siteuser_name', 'siteuser_email', 'siteuser_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'siteuser_id' => 'Siteuser ID',
            'siteuser_name' => 'Siteuser Name',
            'siteuser_email' => 'Siteuser Email',
            'siteuser_password' => 'Siteuser Password',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @inheritdoc
     * @return SiteUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SiteUserQuery(get_called_class());
    }
}
