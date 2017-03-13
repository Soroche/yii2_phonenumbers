<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = $model->name;
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
            'name',
            'last_name',
            'sur_name',
            'date_of_bday',
        ],
    ]) ?> 

    <p>
        <?= Html::a('Create Phone Numbers', ['createphone'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'phone',
                ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}{link}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        //return Html::a('<span class="glyphicon glyphicon-screenshot"></span>', $url);
                        return Html::a('Update', ['updatephone', 'id' => $model->id], ['class' => 'btn btn-primary']);
                        },
                    ],
                ],
            ],

        ]); 
    ?>

</div>
