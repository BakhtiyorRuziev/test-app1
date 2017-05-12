<?php

use app\modules\dish\models\Ingredient;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\DishIngredient */
/* @var $form yii\widgets\ActiveForm */

$ingredients = ArrayHelper::map(Ingredient::find()->all(), 'id','name');

?>

<div class="dish-ingredient-form">

    <?php $form = ActiveForm::begin([

    ]); ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList($ingredients) ?>

    <div class="form-group pull-right">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
