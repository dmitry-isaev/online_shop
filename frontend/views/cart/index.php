<?php

/* @var $products frontend\models\Product */
/* @var $totalSum integer */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'E-Shopper | Корзина';

?>

<section id="cart_items">
    <div class="container">
        <?php if(empty($products)): ?>
        <div class="blank-cart">
            <h4>Ваша корзина пуста</h4>
        </div>
        <?php else: ?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Изображение</td>
                        <td class="description">Название</td>
                        <td class="price">Цена</td>
                        <td class="quantity">Количество</td>
                        <td class="total">Сумма</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $id => $product): ?>
                    <tr>
                        <td class="cart_product">
                            <a href="<?php echo Url::to(['product/view', 'id' => $id]); ?>">
                                <?php echo Html::img("@web/images/products/{$product['img']}"); ?>
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="<?php echo Url::to(['product/view', 'id' => $id]); ?>">
                                    <?php echo $product['name']; ?>
                                </a>
                            </h4>
                        </td>
                        <td class="cart_price">
                            <p>$<?php echo $product['price']; ?></p>
                        </td>
                        <td class="cart_quantity">
                            <input type="number" min="1" max="99" class="counter" value="<?php echo $product['quantity']; ?>" data-id="<?php echo $id; ?>" data-price="<?php echo $product['price']; ?>" />
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$
                                <span id="sum-<?php echo $id; ?>" class="product-sum"><?php echo $product['sum']; ?></span>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="#" data-id="<?php echo $id; ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7">
                        <strong>Общая сумма: $
                            <span id="total-sum"><?php echo $totalSum; ?></span>
                        </strong>
                    </td>
                </tr>
                </tfoot>
            </table>
            <a href="<?php echo Url::to(['cart/checkout']); ?>" class="btn btn-primary btn-lg pull-right">Оформить заказ</a>
        </div>
        <?php endif; ?>
    </div>
</section>