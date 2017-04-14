<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ReportResource]].
 *
 * @see ReportResource
 */
class ReportResourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ReportResource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ReportResource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
