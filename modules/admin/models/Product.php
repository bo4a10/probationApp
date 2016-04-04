<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    const MAX_DISCOUNT_RATE = 99;
    const MIN_DISCOUNT_RATE = 0;
    const MAX_STR_LENGTH = 255;

    const ONEHUNDRED = 100;
    const DECIMAL_PLACES = 2;


    public $photo;


    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['title', 'category', 'short_description', 'productphoto'] , 'string', 'max' => self::MAX_STR_LENGTH],

            ['price', 'double'],
            ['price', 'match', 'pattern' =>'/^(?:[1-9]\d*|0)?(?:\.[\d]{0,2})?$/' ],
            ['price', 'filter', 'filter' => 'trim'],

            ['discount', 'integer', 'max'=> self::MAX_DISCOUNT_RATE, 'min' => self::MIN_DISCOUNT_RATE],

            ['description', 'string'],

            ['show', 'boolean'],

            ['photo', 'safe'],
            ['photo', 'file', 'extensions'=>'jpg, gif, png'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'discount' => 'Discount',
            'category' => 'Category',
            'short_description' => 'Short description',
            'description' => 'Description',
            'productphoto' => 'Product photo',
            'show' => 'Show',
        ];
    }

    public static function findByTitle($title)
    {
        return static::findOne(['title' => $title]);
    }

    public function beforeSave()
    {
        $this->price = round($this->price, 2);
        if (!isset($this->discount)) $this->discount = 0;

        return true;
    }

}