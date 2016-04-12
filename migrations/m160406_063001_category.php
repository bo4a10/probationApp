<?php

use yii\db\Migration;

class m160406_063001_category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'show' => $this->boolean(),
        ]);

    }

    public function down()
    {
        $this->dropTable('category');
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
