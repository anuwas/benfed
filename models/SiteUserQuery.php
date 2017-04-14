<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SiteUser]].
 *
 * @see SiteUser
 */
class SiteUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SiteUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SiteUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
