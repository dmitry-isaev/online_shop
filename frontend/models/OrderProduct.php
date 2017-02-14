<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders_products".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property double $price
 * @property integer $quantity
 * @property double $sum
 */
class OrderProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'quantity', 'sum'], 'required'],
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['price', 'sum'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}
