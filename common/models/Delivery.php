<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id
 * @property integer $delivery_name
 * @property string $delivery_rules
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_name'], 'integer'],
            [['delivery_rules'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_name' => 'Delivery Name',
            'delivery_rules' => 'Delivery Rules',
        ];
    }
}
