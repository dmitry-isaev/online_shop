<?php

/* @var $this yii\web\View */
/* @var $products frontend\models\Product */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'E-Shopper | Товары';

?>

<?php $this->beginBlock('slider'); ?>
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Богатый ассортимент товаров</h2>
                                <p>Огромный выбор товаров в различных категориях. Удобная система поиска и навигации позволит быстро найти интересующую продукцию.</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Скидки и маркетинговые акции</h2>
                                <p>Участвуйте в акциях, предоставляющих скидки на различные товары. Накапливайте бонусные баллы и используйте их для оплаты следующих покупок.</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Качественное обслуживание</h2>
                                <p>Быстрая обработка поступающих заказов и осуществление доставки в любую точку мира. Эффективная служба работы с покупателями.</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endBlock(); ?>

<?php if (!empty($products)): ?>
    <div class="features_items">
        <h2 class="title text-center">Хиты продаж</h2>
        <?php foreach ($products as $product): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="<?php echo Url::to(['product/view', 'id' => $product['id']]); ?>">
                                <?php echo Html::img("@web/images/products/{$product['img']}", ['alt' => $product['name']]); ?>
                            </a>
                            <h2>$<?php echo $product['price']; ?></h2>
                            <p>
                                <a href="<?php echo Url::to(['product/view', 'id' => $product['id']]); ?>">
                                    <?php echo $product['name']; ?>
                                </a>
                            </p>
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>">
                                <i class="fa fa-shopping-cart"></i>В корзину
                            </a>
                        </div>
                        <?php if ($product['new']): ?>
                            <?php echo Html::img('@web/images/home/new.png', ['class' => 'new']) ?>
                        <?php endif; ?>
                        <?php if ($product['sale']): ?>
                            <?php echo Html::img('@web/images/home/sale.png', ['class' => 'new']) ?>
                        <?php endif; ?>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Сравнить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="recommended_items">
    <h2 class="title text-center">Распродажа</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <?php foreach (['1' => '10', '2' => '20', '3' => '30'] as $id => $item): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/images/home/recommend<?php echo $id; ?>.jpg" alt="" />
                                    <h2>$<?php echo $item; ?></h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="item">
                <?php foreach (['1' => '10', '2' => '20', '3' => '30'] as $id => $item): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/images/home/recommend<?php echo $id; ?>.jpg" alt="" />
                                    <h2>$<?php echo $item; ?></h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>