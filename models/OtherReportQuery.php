<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OtherReport]].
 *
 * @see OtherReport
 */
class OtherReportQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OtherReport[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OtherReport|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
