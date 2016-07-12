<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Order;


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
class ViewOrder extends Model
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at', 'delivery'], 'integer'],
            [['amount'], 'number'],
            [['notes'], 'string'],
            [['inner_code'], 'string', 'max' => 10],
            [['coderword'], 'string', 'max' => 25],
            [['refuse', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'inner_code' => 'Inner Code',
            'coderword' => 'Coderword',
            'refuse' => 'Refuse',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delivery' => 'Delivery',
            'notes' => 'Notes',
            'status' => 'Status',
        ];
    }
}
