<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Заказ #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="order-view">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'quantity',
            'sum',
            [
                'attribute' => 'status',
                'value' =>
                    !$model->status
                        ? '<span class="text-danger">Активен</span>'
                        : '<span class="text-success">Завершен</span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]); ?>

    <?php if (empty(!$orderProducts = $model->orderProducts)): ?>
        <h2>Позиции заказа</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($orderProducts as $orderProduct): ?>
                    <tr>
                        <td><?php echo $orderProduct->product_id; ?></td>
                        <td>
                            <a href="<?php echo Yii::$app->urlManagerFrontend->createUrl(
                                    ['product/view', 'id' => $orderProduct->product_id]); ?>">
                                <?php echo $orderProduct->name; ?>
                            </a>
                        </td>
                        <td><?php echo $orderProduct->price; ?></td>
                        <td><?php echo $orderProduct->quantity; ?></td>
                        <td><?php echo $orderProduct->sum; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
