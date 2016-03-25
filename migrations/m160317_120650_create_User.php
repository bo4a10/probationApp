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
            'token' => $this -> string(),
            'auth_key' => $this->string(32),
            'photo' => $this->string(),
        ]);

        $this->insert('user',[
            'username'=>'user1test',
            'password_hash' => $security->generatePasswordHash('userone'),
            'email' => 'userone@user.com',
            'phone_number' => '+78847299283',
            'token' => 'usertoken',
        ]);

       $this->insert('user',[
            'username'=>'admin',
            'password_hash' => $security->generatePasswordHash('admin'),
            'email' => 'admin@admin.com',
            'phone_number' => '+00000000000',
            'token' => 'admintoken',
        ]);


    }


    public function down()
    {
        $this->dropTable('user');
    }
}
