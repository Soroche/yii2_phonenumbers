<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        <?= Html::a('Добавить номер телефона', ['createphone','old_person_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cell_number',
                ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}{link}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a('Изменить', ['updatephone', 'id' => $model->id], ['class' => 'btn btn-success']);
                        },
                    'delete' => function ($url,$model) {
                        return Html::a('Удалить', ['deletephone', 'id' => $model->id], ['class' => 'btn btn-success']);
                        },
                    ],
                ],
            ],

        ]); 
    ?>

</div>
