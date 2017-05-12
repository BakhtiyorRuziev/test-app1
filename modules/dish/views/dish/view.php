<?php

use app\modules\dish\models\Dish;
use app\modules\dish\models\DishIngredient;
use app\modules\dish\models\Ingredient;
use app\modules\dish\models\query\DishQuery;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\Dish */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="dish-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы увереный что хотите удалить данный элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>

<div class="add-ingredients">

    <h1>Ингридиенты</h1>

    <?php
    echo $this->render("_dish_ingridient_form", ['model'=>$ingredient])
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'dish_id',
            [
                'attribute'=>'ingredient_id',
                'value'=>function($data) {
                    return $data->ingredient->name;
                },
                'filter'=>ArrayHelper::map(Ingredient::find()->isNotHideIngredient()->all(), 'id', 'name')
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'controller'=>'dish-ingredient',
                'template'=>'{delete}'
            ],
        ],
    ]); ?>

</div>

