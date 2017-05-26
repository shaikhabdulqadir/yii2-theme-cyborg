<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $main_image
 * @property string $images
 * @property double $cost_price
 * @property double $sell_price
 * @property integer $discount
 *
 * @property ProductCategory $category
 * @property Shop $shop
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'category_id', 'discount'], 'integer'],
            [['cost_price', 'sell_price'], 'number'],
            [['name', 'description', 'main_image', 'images'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'description' => 'Description',
            'main_image' => 'Main Image',
            'images' => 'Images',
            'cost_price' => 'Cost Price',
            'sell_price' => 'Sell Price',
            'discount' => 'Discount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }
}
