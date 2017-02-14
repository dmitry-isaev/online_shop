<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\web\Controller;
use yii\web\HttpException;

class ProductController extends Controller
{
    public function actionView($id)
    {
        $product = Product::findOne($id);

        if (!isset($product)) {
            throw new HttpException(404, 'Данного товара не существует');
        }

        return $this->render('index', [
            'product' => $product,
        ]);
    }
}