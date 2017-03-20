<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = $model->last_name . '  ' . $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Телефонный справочник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'last_name',
            'first_name',
            'sur_name',
            [
                'label' => 'Дата рождения',
                'value' => $model->date_of_bday,
            ],
        ],
    ]) ?> 

    <p>
        <?= Html::a('Добавить номер телефона', Url::to(['phone-number/create', 'oldPersonId' => $model->id]) , ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'cell_number',
                ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}{link}',
                'buttons' => [
                    'update' => function ($action,$model) {
                        return Html::a('', Url::to(['phone-number/update', 'id' => $model->id]), ['class' => 'glyphicon glyphicon-pencil']);
                        },
                    'delete' => function ($action, $model) {
                        return Html::a('', Url::to(['phone-number/delete', 'id' => $model->id]), ['class' => 'glyphicon glyphicon-trash', 'data-confirm' => 'Are you sure you want to delete this item?', 'data-method'=>'post']);
                        },
                    ],
                ],
            ],

        ]); 
    ?>

</div>
