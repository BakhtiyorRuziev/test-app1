<?php

namespace app\modules\dish\controllers;

use app\modules\dish\models\Dish;
use app\modules\dish\models\DishesForm;
use app\modules\dish\models\DishIngredient;
use app\modules\dish\models\Ingredient;
use yii\web\Controller;

/**
 * Default controller for the `dish` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $ingredients = Ingredient::find()->isNotHideIngredient()->all();
        $dishes = [];
        $dish_form = new DishesForm();
        if ($dish_form->load(\Yii::$app->request->post()) && $dish_form->search()) {



            $dishes_raw = Dish::find()
                ->andFilterWhere(['in', 'dishes.id', $dish_form->dishes])
                ->all();

            foreach ($dishes_raw as $dish) {
                if ($dish->isHide) {
                    continue;
                }
                
                $dishes[] = [
                    'name'=>$dish->name,
                    'count'=>DishIngredient::find()->andWhere(['dish_id'=>$dish->id])->andWhere(['in','ingredient_id', $dish_form->ingredients])->count(),
                ];
            }

        }
        
        return $this->render('index', [
            'ingredients'=>$ingredients,
            'dish_form'=>$dish_form,
            'dishes'=>$dishes
        ]);
    }
}
