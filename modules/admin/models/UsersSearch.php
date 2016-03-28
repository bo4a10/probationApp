<?php

namespace app\modules\admin\models;

use app\models\User,
    yii\data\ActiveDataProvider;


class UsersSearch extends User
{

    public function rules()
    {
        return [
            ['id', 'integer'],
            [['username', 'email', 'phone_number'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return parent::scenarios();
    }

    public function search($params)
    {
        $query = User::find();

        $dataprovider =  new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['username',],
            ],

        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataprovider;
        }

        $query->andFilterWhere([
            'username' => $this->username,
        ]);
        $query->andFilterWhere([
            'email' => $this->email,
        ]);
        $query->andFilterWhere([
            'phone_number' => $this->phone_number,
        ]);
        $query->andFilterWhere([
            'token' => 'usertoken',
        ]);
        return $dataprovider;
    }
}