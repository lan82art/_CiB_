<?php

use yii\db\Migration;

class m160321_092418_goods extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%goods_category}}', [
            'id' =>         $this->primaryKey(),
            'parent_id' =>  $this->integer(),
            'title' =>      $this->string(),
            'slug' =>       $this->string(),
        ], $tableOptions);

        /*
        *cat_id varchar(6) binary NOT NULL,
         ucat_id varchar(5) binary NOT NULL,
         m_gr_id int(5) UNSIGNED NOT NULL DEFAULT 0,
         u_gr_id int(5) UNSIGNED NOT NULL DEFAULT 0,
         kult varchar(255) binary NOT NULL,

         flower_size varchar(10) binary DEFAULT NULL,
         size varchar(15) binary DEFAULT NULL,
         height varchar(10) binary DEFAULT NULL,
         h_izm varchar(5) binary DEFAULT NULL,
         gr_cond varchar(100) binary DEFAULT NULL,
         blossom varchar(50) binary DEFAULT NULL,

         offer varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
         groupofseeds tinyint(4) UNSIGNED DEFAULT 0,
         bonus smallint(6) UNSIGNED DEFAULT 0,

         UNIQUE INDEX cat_id (cat_id, ucat_id, code)*/

        $this->createTable('{{%goods%}}', [
            'id' =>             $this->primaryKey(),
            'title' =>          $this->string(),
            'slug' =>           $this->string(),
            'category_id' =>    $this->integer(),
            'cat_id' =>         $this->string(7),
            'ucat_id' =>        $this->string(7),
            'code' =>           $this->string(10),
            'picture' =>        $this->string(),
            'price' =>          $this->money(),
            'fas' =>            $this->decimal(3),
            'izmer' =>          $this->string(10),
            'bonus' =>          $this->smallInteger(),
            'active' =>         $this->boolean(),
            'novelty' =>        $this->boolean(),
            'offer' =>          $this->string(),
            'seed_group' =>     $this->smallInteger(4),
            'eav' =>            $this->integer(),
            'descript_id' =>    $this->string(20),
        ],$tableOptions);

        //$this->addPrimaryKey('unic_goods','goods',['cat_id','ucat_id','code']);
    }
    public function safeDown()
    {
        $this->dropTable('{{%goods_category}}');
        $this->dropTable('{{%goods}}');

        echo "Table goods_category has dropped. \n";
        echo "Table goods has dropped. \n";
    }
}
