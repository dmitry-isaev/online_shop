<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $quantity
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            [['quantity'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $session = Yii::$app->session;
        $session->open();

        $products = $_SESSION['cart'];
        $totalSum = 0;
        $totalQuantity = 0;

        foreach ($products as $product) {
            $totalSum += $product['sum'];
            $totalQuantity += $product['quantity'];
        }

        $this->quantity = $totalQuantity;
        $this->sum = $totalSum;

        return parent::save($runValidation, $attributeNames);
    }

    public function saveOrderProducts($orderId, $products)
    {
        foreach ($products as $id => $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $orderId;
            $orderProduct->product_id = $id;
            $orderProduct->name = $product['name'];
            $orderProduct->price = $product['price'];
            $orderProduct->quantity = $product['quantity'];
            $orderProduct->sum = $product['sum'];
            $orderProduct->save();
        }

        return true;
    }
}
