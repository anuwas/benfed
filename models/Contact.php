<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $contact_id
 * @property integer $districtemail_id
 * @property string $contact_name
 * @property string $phone
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property integer $active
 * @property string $created_date
 *
 * @property DistrictEmail $districtemail
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['districtemail_id'], 'required'],
            [['districtemail_id', 'active'], 'integer'],
            [['message'], 'string'],
            [['created_date'], 'safe'],
            [['contact_name', 'subject'], 'string', 'max' => 145],
            [['phone', 'email'], 'string', 'max' => 45],
            [['districtemail_id'], 'exist', 'skipOnError' => true, 'targetClass' => DistrictEmail::className(), 'targetAttribute' => ['districtemail_id' => 'districtemail_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'districtemail_id' => 'Districtemail ID',
            'contact_name' => 'Contact Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrictemail()
    {
        return $this->hasOne(DistrictEmail::className(), ['districtemail_id' => 'districtemail_id']);
    }

    /**
     * @inheritdoc
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
