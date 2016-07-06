<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Наименование',
            'status' => 'Статус',
            'slug' => 'Slug',
        ];
    }
    public function getParentCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' =>'parent_id']);
    }
    public function getParentCategoryTitle()
    {
        return $this->parentCategory->title;
    }
    public function getGoodsCategory()
    {
        return $this->hasMany(GoodsCategory::className(), ['parent_id' => 'id']);
    }
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['category_id' => 'id']);
    }
}
