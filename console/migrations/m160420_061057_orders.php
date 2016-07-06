<?php

use yii\db\Migration;

class m160420_061057_orders extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'amount' => $this->float(),
            'inner_code' => $this->string(10),
            'coderword' => $this->string(25),
            'refuse' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delivery' => $this->integer(),
            'notes' => $this->text(),
            'status' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%order_items}}', [
            'order_id' => $this->integer(),
            'price' => $this->money(),
            'goods_cat_id' => $this->string(7),
            'goods_ucat_id' => $this->string(7),
            'goods_code' => $this->string(10),
            //'quantity' => $this->integer(5),
            'quantity' => $this->float(),
        ], $tableOptions);
        $this->addPrimaryKey('unic_order_items','order_items',['goods_cat_id','goods_ucat_id','goods_code']);

        $this->createTable('{{%delivery}}', [
            'id' => $this->primaryKey(),
            'delivery_name' => $this->string(),
            'delivery_rules' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160420_061057_orders cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
