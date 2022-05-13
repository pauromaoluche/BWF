<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PageInformation]].
 *
 * @see PageInformation
 */
class PageInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PageInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PageInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
