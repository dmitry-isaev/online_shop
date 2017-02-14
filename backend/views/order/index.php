<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'timeZone' => 'Europe/Moscow',
        ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    return !$data->status
                        ? '<span class="text-danger">Активен</span>'
                        : '<span class="text-success">Завершен</span>';
                },
                'format' => 'html'
            ],
            'name',
            'email:email',
            'phone',
            'address',
            'quantity',
            'sum',
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:d.m.Y h:i'],
            ],
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>