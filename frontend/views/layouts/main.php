<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use frontend\assets\IEAsset;

AppAsset::register($this);
IEAsset::register($this);

?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo Html::encode($this->title); ?></title>
        <?php $this->head(); ?>
        <link rel="shortcut icon" href="<?php echo Url::to(['@frontend/favicon.ico']); ?>">
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><i class="fa fa-phone"></i> 8 (495) 148-23-11</li>
                                    <li><i class="fa fa-envelope"></i> e-shopper@info.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="<?php echo Url::to(['cart']); ?>">
                                            <i class="fa fa-shopping-cart"></i> Корзина
                                            <span id="cart-quantity">
                                                <?php if (Yii::$app->session->get('cart.quantity')): ?>
                                                <?php echo '(' . Yii::$app->session->get('cart.quantity') . ')'; ?>
                                                <?php endif; ?>
                                            </span>
                                        </a>
                                    </li>
                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <li>
                                            <a href="<?php echo Url::to(['/login']); ?>">
                                                <i class="fa fa-lock"></i> Вход
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?php echo Url::to(['/logout']); ?>">
                                                <i class="fa fa-lock"></i>
                                                Выход (<?php echo Yii::$app->user->identity->username; ?>)
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?php echo Yii::$app->homeUrl; ?>">
                                    <?php echo Html::img('@web/images/home/logo.png', ['alt' => 'logo']); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="search_box pull-right">
                                <?php echo Html::beginForm([Url::to('search')], 'get'); ?>
                                <?php echo Html::input('text', 'q', null, ['placeholder' => 'Поиск']); ?>
                                <?php echo Html::endForm(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $content; ?>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <p>Copyright © 2017 E-SHOPPER. Все права защищены.</p>
                </div>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>