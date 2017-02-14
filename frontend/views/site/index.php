<?php

/* @var $this yii\web\View */
/* @var $products frontend\models\Product */
/* @var $content string */

use frontend\components\MenuCategoriesWidget;

$this->title = 'E-Shopper | Главная';

?>

<?php if (isset($this->blocks['slider'])): ?>
    <?php echo $this->blocks['slider']; ?>
<?php endif; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <?php echo MenuCategoriesWidget::widget(); ?>
                    <div class="brands_products">
                        <h2>Бренды</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-range">
                        <h2>Фильтры</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <div class="shipping text-center">
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>