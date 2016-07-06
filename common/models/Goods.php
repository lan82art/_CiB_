<?php

namespace common\models;

use yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $category_id
 * @property string $cat_id
 * @property string $ucat_id
 * @property string $code
 * @property string $picture
 * @property string $price
 * @property string $fas
 * @property string $izmer
 * @property integer $bonus
 * @property integer $active
 * @property integer $novelty
 * @property string $offer
 * @property integer $seed_group
 * @property integer $eav
 * @property string $descript_id
 */
class Goods extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'bonus', 'active', 'novelty', 'seed_group', 'eav'], 'integer'],
            [['title','category_id','cat_id', 'ucat_id', 'code'], 'required'],
            [['price', 'fas'], 'number'],
            [['title', 'slug', 'picture', 'offer'], 'string', 'max' => 255],
            [['cat_id', 'ucat_id'], 'string', 'max' => 7],
            [['code', 'izmer'], 'string', 'max' => 10],
            [['descript_id'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'category_id' => 'Category ID',
            'cat_id' => 'Cat ID',
            'ucat_id' => 'Ucat ID',
            'code' => 'Code',
            'picture' => 'Picture',
            'price' => 'Price',
            'fas' => 'Fas',
            'izmer' => 'Izmer',
            'bonus' => 'Bonus',
            'active' => 'Active',
            'novelty' => 'Novelty',
            'offer' => 'Offer',
            'seed_group' => 'Seed Group',
            'eav' => 'Eav',
            'descript_id' => 'Descript ID',
        ];
    }
    public function getGoodsCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'category_id']);
    }
    public function getGoodsCategoryTitle()
    {
        return $this->goodsCategory->title;
    }
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['product_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'category_id']);
    }
    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
}
