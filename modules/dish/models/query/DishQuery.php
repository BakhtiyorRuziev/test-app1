<?php

namespace app\modules\dish\models\query;
use app\modules\dish\models\DishIngredient;

/**
 * This is the ActiveQuery class for [[\app\modules\dish\models\Dish]].
 *
 * @see \app\modules\dish\models\Dish
 */
class DishQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/




    /**
     * @inheritdoc
     * @return \app\modules\dish\models\Dish[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\dish\models\Dish|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
