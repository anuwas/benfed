<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NoticeResource]].
 *
 * @see NoticeResource
 */
class NoticeResourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return NoticeResource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NoticeResource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
