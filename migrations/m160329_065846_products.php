<?php

use yii\db\Migration;

class m160329_065846_products extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->double()->notNull(),
            'discount' => $this->integer(),
            'short_description' => $this -> string(255),
            'description' => $this->text(),
            'productphoto' => $this->string(),
            'show' => $this->boolean(),
        ]);

    }

    public function down()
    {
        $this->dropTable('products');
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
