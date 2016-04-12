<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord,
    yii\helpers\ArrayHelper;

class Category extends ActiveRecord
{
    const MAX_STR_LENGTH = 64;

    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name', 'show'], 'required'],
            ['name', 'string', 'max' => self::MAX_STR_LENGTH],

            ['show', 'boolean'],

        ];
    }

    public function getProductsCategory()
    {
        return $this->hasMany(ProductsCategory::className(), ['category_id' => 'id']);

    }

    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['id' => 'products_id'])
            ->viaTable('products_category', ['category_id' => 'id']);
    }

    public static function getDropDownArray()
    {
        return $arrhelper = ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

}