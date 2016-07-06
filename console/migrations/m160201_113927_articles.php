<?php
use yii\db\Migration;

class m160201_113927_articles extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%art_category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(),
            'slug' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'art_cat_id' => $this->integer()->notNull(),
            'is_news' => $this->smallInteger(1),
            'date' => $this->integer()->notNull(),
            'author' => $this->string(),
            'art_title' => $this->string()->notNull(),
            'article' => $this->text()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%art_category}}');
        $this->dropTable('{{%articles}}');

        echo "Table art_category has dropped. \n";
        echo "Table articles has dropped. \n";
    }

}
