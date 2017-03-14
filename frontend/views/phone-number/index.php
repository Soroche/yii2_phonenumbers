<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PhoneNumbersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phone Number';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-number-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Phone Number', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cell_number',
            [
            'value' => 'person.last_name',
            ],
            [
            
            'value' => 'person.first_name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
