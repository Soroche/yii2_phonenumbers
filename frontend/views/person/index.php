<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'last_name',
            'sur_name',
            [
            'attribute' => 'date_of_bday',
            'format' => ['date', 'php:d-m-Y']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
