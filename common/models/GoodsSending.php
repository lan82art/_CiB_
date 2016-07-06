<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods_delivery".
 *
 * @property integer $id
 * @property string $ucat_id
 * @property string $cat_id
 * @property string $title
 * @property string $finish_date
 * @property string $delivery_text
 * @property integer $active
 */
class GoodsSending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_sending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ucat_id', 'cat_id', 'title', 'finish_date', 'delivery_text', 'active'], 'required'],
            [['finish_date'], 'safe'],
            [['active'], 'integer'],
            [['ucat_id', 'cat_id'], 'string', 'max' => 6],
            [['title', 'delivery_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ucat_id' => 'Подкаталог',
            'cat_id' => 'Каталог',
            'title' => 'Заглавие',
            'finish_date' => 'Дата окончания приема заказов',
            'delivery_text' => 'Текст о доставке',
            'active' => 'Active',
        ];
    }
}
