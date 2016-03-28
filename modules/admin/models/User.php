<?php

namespace app\modules\admin\models;

use Yii,
    yii\helpers\ArrayHelper;

class User extends \app\models\User
{
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';

    public $newPassword;
    public $newPasswordRepeat;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['newPassword', 'newPasswordRepeat'], 'required', 'on' => self::SCENARIO_ADMIN_CREATE],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],

            ['phone_number', 'string'],
            ['phone_number', 'filter', 'filter' => 'trim'],
            ['phone_number', 'unique', 'targetClass' => User::className(), 'message' => 'This phone number has already been taken.'],
            ['phone_number', 'match', 'pattern' =>'/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            ['phone_number', 'string', 'max' => 20],
        ]);
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['username', 'email', 'phone_number', 'newPassword', 'newPasswordRepeat'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['username', 'email', 'phone_number', 'newPassword', 'newPasswordRepeat'];
        return $scenarios;
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'newPassword' => 'New password',
            'newPasswordRepeat' => 'Repeat password',
        ]);
    }

    public function beforeSave($insert)
    {
        $this->token = 'usertoken';
        if (parent::beforeSave($insert)) {
            if (!empty($this->newPassword)) {
                $this->setPassword($this->newPassword);
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['id', 'username',], 'required'],
//            [['phone_number'], 'string', 'max' => 20],
//            [['email'], 'string'],
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function attributeLabels()
//    {
//        return [
//            'id'           => 'ID',
//            'username'     => 'Username',
//            'password'     => 'Password',
//            'phone_number' => 'Telephone number',
//            'email'        => 'Email',
//        ];
//    }


}