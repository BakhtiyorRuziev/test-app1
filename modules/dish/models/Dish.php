<?php

namespace app\modules\dish\models;

use app\modules\dish\models\query\DishQuery;
use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string $name
 * @property string $isHide
 *
 * @property DishIngredient[] $dishIngredients
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'isHide' => 'Скрыт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishIngredients()
    {
        return $this->hasMany(DishIngredient::className(), ['dish_id' => 'id']);
    }


    public function getIsHide()
    {
        $ing = DishIngredient::find()
            ->andWhere(['dish_ingredients.dish_id'=>$this->id, 'ingredients.is_hide'=>1])
            ->joinWith("ingredient")
            ->exists();

        return $ing;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(DishIngredient::className(), ['dish_id'=>'id']);
    }





    /**
     * @inheritdoc
     * @return \app\modules\dish\models\query\DishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DishQuery(get_called_class());
    }

}
