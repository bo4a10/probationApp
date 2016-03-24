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
            'password_hash' => $security->generatePasswordHash('UserOne'),
            'email' => 'userone@user.com',
            'phone_number' => '+78847299283',
            'token' => 'usertoken',
        ]);

//        $this->insert('user',[
//            'username'=>'user2test',
//            'password_hash' => $security->generatePasswordHash('UserTwo'),
//            'email' => 'usertwo@user.com',
//            'phonenumber' => '+72238911163',
//            'token' => 'usertoken',
//        ]);
//
//        $this->insert('user',[
//            'username'=>'user3test',
//            'password_hash' => $security->generatePasswordHash('UserThree'),
//            'email' => 'userthree@user.com',
//            'phonenumber' => '+71937582043',
//            'token' => 'usertoken',
//        ]);
//
//        $this->insert('user',[
//            'username'=>'user4test',
//            'password_hash' => $security->generatePasswordHash('UserFour'),
//            'email' => 'userfour@user.com',
//            'phonenumber' => '+73820928461',
//            'token' => 'usertoken',
//        ]);
//
//        $this->insert('user',[
//            'username'=>'user5test',
//            'password_hash' =>$security->generatePasswordHash('UserFive'),
//            'email' => 'userfive@user.com',
//            'phonenumber' => '+73857299462',
//            'token' => 'usertoken',
//        ]);

    }


    public function down()
    {
        $this->dropTable('user');
    }
}
