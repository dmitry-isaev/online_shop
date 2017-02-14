<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Product;
use frontend\models\Cart;
use frontend\models\Order;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;

        $products = $session->get('cart');

        $totalSum = 0;
        if (isset($products)) {
            foreach ($products as $product) {
                $totalSum += $product['sum'];
            }
        }

        return $this->render('index', [
            'products' => $products,
            'totalSum' => $totalSum,
        ]);
    }

    public function actionCheckout()
    {
        $model = new Order();

        $session = Yii::$app->session;
        $session->open();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save() && $model->saveOrderProducts($model->id, $_SESSION['cart'])) {
                $session->remove('cart');
                $session->remove('cart.quantity');
                Yii::$app->session->setFlash('success', 'Ваш заказ успешно оформлен');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'При оформлении заказа произошла ошибка');
            }
        }

        return $this->render('checkout', [
            'model' => $model,
        ]);
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->post('id');
        $quantity = Yii::$app->request->post('quantity') ? Yii::$app->request->post('quantity') : 1;

        $product = Product::findOne($id);

        if (!isset($product)) return false;

        $session = Yii::$app->session;
        $session->open();

        Cart::addProduct($product, $quantity);

        $totalQuantity = 0;
        foreach ($_SESSION['cart'] as $id => $product) {
            $totalQuantity += $product['quantity'];
        }

        return $_SESSION['cart.quantity'];
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $session = Yii::$app->session;
        $session->open();

        Cart::deleteProduct($id);

        return $_SESSION['cart.quantity'];
    }

    public function actionUpdate()
    {
        $id = Yii::$app->request->post('id');
        $quantity = Yii::$app->request->post('quantity') ? Yii::$app->request->post('quantity') : 1;

        $session = Yii::$app->session;
        $session->open();

        Cart::updateProduct($id, $quantity);

        return $_SESSION['cart.quantity'];
    }
}