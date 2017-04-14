<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CmsResource]].
 *
 * @see CmsResource
 */
class CmsResourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CmsResource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CmsResource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
