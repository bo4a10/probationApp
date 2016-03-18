<?php

use yii\db\Migration;

class m160317_120650_create_User extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phonenumber' => $this-> string(20),
            'token' => $this -> string(),
        ]);

        $this->insert('user',[
            'login'=>'user1test',
            'password' =>'UserOne',
            'email' => 'userone@user.com',
            'phonenumber' => '+78847299283',
            'token' => 'usertoken',
        ]);

        $this->insert('user',[
            'login'=>'user2test',
            'password' =>'UserTwo',
            'email' => 'usertwo@user.com',
            'phonenumber' => '+72238911163',
            'token' => 'usertoken',
        ]);

        $this->insert('user',[
            'login'=>'user3test',
            'password' =>'UserThree',
            'email' => 'userthree@user.com',
            'phonenumber' => '+71937582043',
            'token' => 'usertoken',
        ]);

        $this->insert('user',[
            'login'=>'user4test',
            'password' =>'UserFour',
            'email' => 'userfour@user.com',
            'phonenumber' => '+73820928461',
            'token' => 'usertoken',
        ]);

        $this->insert('user',[
            'login'=>'user5test',
            'password' =>'UserFive',
            'email' => 'userfive@user.com',
            'phonenumber' => '+73857299462',
            'token' => 'usertoken',
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
