<?php


use yii\db\Migration;


class m160317_120650_create_User extends Migration
{

    public function up()
    {

        $security = new \yii\base\Security();

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone_number' => $this-> string(20),
            'group' => $this -> string(32),
            'auth_key' => $this->string(32),
            'photo' => $this->string(),
        ]);


       $this->insert('user',[
            'username'=>'admin',
            'password_hash' => $security->generatePasswordHash('admin'),
            'email' => 'admin@admin.com',
            'phone_number' => '+00000000000',
            'group' => 'admin',
        ]);


    }


    public function down()
    {
        $this->dropTable('user');
    }
}
