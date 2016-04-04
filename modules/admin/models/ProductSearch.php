<?php

namespace app\modules\admin\models;

use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{
    const PAGESIZE = 10;

    public function rules()
    {
        return [
            [['price', 'title', 'discount', 'category'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Product::find();

        $dataprovider =  new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => self::PAGESIZE,
            ],
            'sort' => [
                'attributes' => ['title', 'price', 'discount', 'category'],
            ],

        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataprovider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);

        if (!empty($this->price)) {
            $query->andFilterWhere(['>=', 'price', $this->price])
                ->andFilterWhere(['<', 'price', $this->price + 1]);
        }

        $query->andFilterWhere([
            'discount' => $this->discount,
        ]);
        $query->andFilterWhere([
            'category' => $this->category,
        ]);
        $query->andFilterWhere([
            'short_description' => $this->short_description,
        ]);
        $query->andFilterWhere([
            'show' => $this->show,
        ]);

        return $dataprovider;
    }
}
