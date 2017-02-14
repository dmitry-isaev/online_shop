<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = '404 - Страница не найдена';

?>

<div class="container text-center">
    <div class="content-404">
        <?php echo Html::img('@web/images/404/404.png', ['alt' => '404']); ?>
        <h1><b>Страница не найдена</b></h1>
        <?php echo nl2br(Html::encode($message)); ?>
        <h2><a href="<?php echo Yii::$app->homeUrl; ?>">Вернуться на главную</a></h2>
    </div>
</div>