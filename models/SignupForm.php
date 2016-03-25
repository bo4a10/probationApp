<?php


namespace app\models;

use yii\base\Model,
    Yii;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone_number;
    public $photo;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['photo', 'safe'],
            ['photo', 'file', 'extensions'=>'jpg, gif, png'],

            ['phone_number', 'string'],
            ['phone_number', 'filter', 'filter' => 'trim'],
            ['phone_number', 'unique', 'targetClass' => User::className(), 'message' => 'This phone number has already been taken.'],
            ['phone_number', 'match', 'pattern' =>'/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            ['phone_number', 'string', 'max' => 20],

        ];
    }




}