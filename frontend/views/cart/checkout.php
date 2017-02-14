<?php

/* @var $model frontend\models\Order */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<section>
    <div id="cart-checkout" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-form">
                    <h2 class="title text-center">Оформление заказа</h2>
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="status alert alert-success">
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="status alert alert-danger">
                            <?php echo Yii::$app->session->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php $form = ActiveForm::begin(); ?>
                    <?php echo $form->field($model, 'name'); ?>
                    <?php echo $form->field($model, 'email'); ?>
                    <?php echo $form->field($model, 'phone'); ?>
                    <?php echo $form->field($model, 'address')->textarea(['rows' => '5']); ?>
                    <?php echo Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary pull-right']); ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>