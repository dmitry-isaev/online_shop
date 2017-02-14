<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Category;
use frontend\models\Product;
use yii\web\HttpException;

class CategoryController extends Controller
{
    public function actionView($id)
    {
        $category = Category::find()->where(['id' => $id])->select(['name'])->one();

        if(!isset($category)) {
            throw new HttpException(404, 'Данной категории не существует');
        }

        $query = Product::find()->where(['category_id' => $id]);

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
            'forcePageParam' => false
        ]);

        $products = $query
            ->offset($pagination->getOffset())
            ->limit($pagination->getLimit())
            ->asArray()
            ->all();

        return $this->render('index', [
            'products' => $products,
            'category' => $category,
            'pagination' => $pagination,
        ]);
    }
}