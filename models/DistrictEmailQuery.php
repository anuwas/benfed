<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DistrictEmail]].
 *
 * @see DistrictEmail
 */
class DistrictEmailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DistrictEmail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DistrictEmail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
