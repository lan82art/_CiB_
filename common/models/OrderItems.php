<?php

namespace common\models;

use yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $price
 * @property string $goods_cat_id
 * @property string $goods_ucat_id
 * @property string $goods_code
 * @property integer $quantity
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['goods_cat_id', 'goods_ucat_id'], 'string', 'max' => 7],
            [['goods_code'], 'string', 'max' => 10],
        ];
    }
    /**
     * @inheritdoc
     */
    public function getOrder(){
        return $this->hasOne(Order::className(),['id'=>'id']);
    }
    
    public function getGoods(){
        return $this->hasMany(Goods::className(),['unic_order_items'=>'unic_goods']);
    }

    public function attributeLabels()
    {
        return [
            'order_id' => 'ID Заказа',
            'price' => 'Цена',
            'goods_cat_id' => 'Каталог товара',
            'goods_ucat_id' => 'Подкаталог',
            'goods_code' => 'Код товара',
            'quantity' => 'Количество',
        ];
    }
}
