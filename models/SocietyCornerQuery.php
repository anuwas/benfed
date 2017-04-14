<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SocietyCorner]].
 *
 * @see SocietyCorner
 */
class SocietyCornerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SocietyCorner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SocietyCorner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
