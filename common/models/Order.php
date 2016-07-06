<?php

namespace common\models;

use yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $amount
 * @property string $inner_code
 * @property string $coderword
 * @property string $refuse
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $delivery
 * @property string $notes
 * @property string $status
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 'New';
    const STATUS_IN_PROGRESS = 'In progress';
    const STATUS_DONE = 'Done';

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->status = self::STATUS_NEW;
            }
            return true;
        } else {
            return false;
        }
    }

    public static function tableName()
    {
        return 'order';
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
            [['user_id', 'created_at', 'updated_at', 'delivery'], 'integer'],
            [['amount'], 'number'],
            [['notes'], 'string'],
            [['delivery'], 'required'],
            [['inner_code'], 'string', 'max' => 10],
            [['coderword'], 'string', 'max' => 25],
            [['refuse', 'status'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(),['order_id'=>'id']);
    }

    public function getDelivery(){
        return $this->hasOne(Delivery::className(), ['id' => 'delivery']);
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID Пользователя',
            'amount' => 'Сумма',
            'inner_code' => 'Внутренний код',
            'coderword' => 'Кодовое слово',
            'refuse' => 'Отказаться',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'delivery' => 'Доставка',
            'notes' => 'Примечания (экспериментальная функция)',
            'status' => 'Статус',
        ];
    }
    public static function getStatuses()
    {
        return [
            self::STATUS_DONE => 'Done',
            self::STATUS_IN_PROGRESS => 'In progress',
            self::STATUS_NEW => 'New',
        ];
    }
}
