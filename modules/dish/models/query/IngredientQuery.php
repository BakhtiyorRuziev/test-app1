<?php

namespace app\modules\dish\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\dish\models\Ingredient]].
 *
 * @see \app\modules\dish\models\Ingredient
 */
class IngredientQuery extends \yii\db\ActiveQuery
{
    public function isHideIngredient()
    {
        return $this->andWhere(['is_hide'=>true]);
    }

    public function isNotHideIngredient()
    {
        return $this->andWhere(['is_hide'=>false]);
    }

    /**
     * @inheritdoc
     * @return \app\modules\dish\models\Ingredient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\dish\models\Ingredient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
