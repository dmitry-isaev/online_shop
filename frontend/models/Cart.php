<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public static function addProduct($product, $quantity = 1)
    {
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product->id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'sum' => $product->price,
                'price' => $product->price,
                'img' => $product->img,
            ];
        }

        $_SESSION['cart.quantity'] += $quantity;
    }

    public static function deleteProduct($id)
    {
        $_SESSION['cart.quantity'] -= $_SESSION['cart'][$id]['quantity'];
        unset($_SESSION['cart'][$id]);
    }

    public static function updateProduct($id, $quantity)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
            $_SESSION['cart'][$id]['sum'] = $_SESSION['cart'][$id]['price'] * $quantity;
        }

        $_SESSION['cart.quantity'] = 0;
        foreach ($_SESSION['cart'] as $id => $item) {
            $_SESSION['cart.quantity'] += $item['quantity'];
        }
    }
}