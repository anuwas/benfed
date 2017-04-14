<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EventResource]].
 *
 * @see EventResource
 */
class EventResourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EventResource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EventResource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
