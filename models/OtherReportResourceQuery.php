<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OtherReportResource]].
 *
 * @see OtherReportResource
 */
class OtherReportResourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OtherReportResource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OtherReportResource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
