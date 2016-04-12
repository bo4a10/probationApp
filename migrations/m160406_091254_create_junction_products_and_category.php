<?php

use yii\db\Migration;

class m160406_091254_create_junction_products_and_category extends Migration
{
    public function up()
    {
        $this->createTable('products_category', [
            'products_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(products_id, category_id)'
        ]);

        $this->createIndex('idx-products_category-products_id', 'products_category', 'products_id');
        $this->createIndex('idx-products_category-category_id', 'products_category', 'category_id');

        $this->addForeignKey('fk-products_category-products_id', 'products_category', 'products_id', 'products', 'id', 'CASCADE');
        $this->addForeignKey('fk-products_category-category_id', 'products_category', 'category_id', 'category', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('products_category');
    }
}
