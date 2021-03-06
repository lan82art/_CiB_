<?php

//use yii\db\Schema;
use yii\db\Migration;

class m160126_073234_user extends Migration
{
    public function SafeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->date()->notNull(),
            'updated_at' => $this->date()->notNull(),

            'in_code' => $this->integer(15),
            'surname' => $this->string(75)->notNull(),
            'name' => $this->string(75)->notNull(),
            'patronymic' => $this->string(75)->notNull(),
            'phone' => $this->string(25)->notNull(),
            'address' => $this->string()->notNull(),
            'post_index' => $this->integer(5)->notNull(),
        ], $tableOptions);
    }

    public function SafeDown()
    {
        $this->dropTable('{{%user}}');
        echo "Table user has dropped.\n";
    }

}
