<?php

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination */
/* @var $products frontend\models\Product */
/* @var $category frontend\models\Category */
/* @var $q string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use frontend\components\MenuCategoriesWidget;

$this->title = 'E-Shopper | Товары';

?>

<section id="advertisement">
    <div class="container">
        <?php echo Html::img('@web/images/shop/advertisement.jpg', ['alt' => 'advertisement']); ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <?php echo MenuCategoriesWidget::widget(); ?>
                    <div class="brands_products">
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-range">
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <div class="shipping text-center">
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <?php if (isset($q) && !empty($q)): ?>
                        <h2 class="title text-center">Вы искали: <?php echo Html::encode($q); ?></h2>
                    <?php else: ?>
                        <h2 class="title text-center"><?php echo $category->name; ?></h2>
                    <?php endif; ?>
                    <?php if(empty($products)): ?>
                        <?php if (isset($q)): ?>
                        <p>По вашему запросу ничего не найдено</p>
                        <?php else: ?>
                        <p>В данной категории товары отсутствуют</p>
                        <?php endif; ?>
                    <?php else: ?>
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
                                            <a href="#" class="btn btn-fefault add-to-cart" data-id="<?php echo $product['id']; ?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
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
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if (isset($pagination)): ?>
                        <?php echo LinkPager::widget(['pagination' => $pagination]); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>