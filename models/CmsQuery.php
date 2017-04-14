<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cms]].
 *
 * @see Cms
 */
class CmsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Cms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
