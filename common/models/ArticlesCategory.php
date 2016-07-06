<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "art_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 */
class ArticlesCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'art_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
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
            'parent_id' => 'Родитель',
            'title' => 'Название категории',
            'slug' => 'Slug',
        ];
    }
    public function getParentCategory()
    {
        return $this->hasOne(ArticlesCategory::className(), ['parent_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesCategory()
    {
        return $this->hasMany(ArticlesCategory::className(), ['parent_id' => 'id']);
    }

    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['art_cat_id' => 'id']);
    }
}
