<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district_email".
 *
 * @property integer $districtemail_id
 * @property string $district_name
 * @property string $district_email
 * @property integer $active
 * @property string $created_date
 *
 * @property Contact[] $contacts
 */
class DistrictEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_name', 'district_email'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['district_name', 'district_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'districtemail_id' => 'Districtemail ID',
            'district_name' => 'District Name',
            'district_email' => 'District Email',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['districtemail_id' => 'districtemail_id']);
    }

    /**
     * @inheritdoc
     * @return DistrictEmailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistrictEmailQuery(get_called_class());
    }
}
