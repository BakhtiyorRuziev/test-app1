<?php

namespace app\modules\dish\models;

use app\modules\dish\models\Dish;
use app\modules\dish\models\DishIngredient;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DishesForm extends Model
{
    public $ingredients = [];
    public $dishes = [];


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['ingredients'], 'required'],
            ['ingredients', 'each', 'rule'=> ['integer']],
            ['ingredients', 'checkIngredientCount'],
        ];
    }

    public function checkIngredientCount()
    {
        if (count($this->ingredients) <=2 ) {
            $this->addError("ingredients", "Нужно выбрать больше двух ингридиентов");
        }
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'ingredients' => 'Ингредиенты',
        ];
    }

    public function search()
    {
        if ($this->validate()) {



            $dishes = DishIngredient::find()
                ->select(['dish_id'])
                ->groupBy("dish_id")
                ->andWhere(['in', 'ingredient_id', $this->ingredients])
            ;
            $this->dishes = $dishes->createCommand()->queryColumn();



            return true;


        }
        return false;

    }
}
