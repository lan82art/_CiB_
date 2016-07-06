<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property integer $art_cat_id
 * @property integer $is_news
  * @property string $author
 * @property string $art_title
 * @property string $article
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['art_title', 'article'], 'required'],
            [['art_cat_id', 'is_news', 'created_at', 'updated_at'], 'integer'],
            [['article'], 'string'],
            [['author', 'art_title'], 'string', 'max' => 255]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'art_cat_id' => 'Категория',
            'is_news' => 'Новость?',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'author' => 'Автор',
            'art_title' => 'Заглавие',
            'article' => 'Статья',
        ];
    }
    public function getArticlesCategory()
    {
        return $this->hasOne(ArticlesCategory::className(), ['id' => 'art_cat_id']);
    }
}
