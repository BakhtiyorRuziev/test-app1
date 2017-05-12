<?php
use app\modules\dish\models\Dish;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="dish-default-index">

    <h1>Поиск блюд</h1>

    <div class="dish-ingredient-form">

        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($dish_form, 'ingredients')->checkboxList(ArrayHelper::map($ingredients, 'id', 'name')) ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <table class="table table-bordered">
            <thead>
            <th>Название блюдо</th>
            <th>Количество совпадающих ингридиентов</th>
            </thead>
            <?php
            /** @var Dish[] $dishes */
            foreach ($dishes as $dish) {


            ?>
            <tr>
                <td><?=$dish['name']?></td>
                <td><?=$dish['count']?></td>
            </tr>
            <?php } ?>
        </table>


    </div>

</div>
