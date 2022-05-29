<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $product
 * @property int|null $price
 * @property int|null $counts
 *
 * @property OrderInfo[] $orderInfos
 * @property TechCard[] $techCards
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'price', 'counts'], 'integer'],
            [['product_name'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product',
            'price' => 'Price',
            'counts' => 'Counts',
        ];
    }

    /**
     * Gets query for [[OrderInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[TechCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechCards()
    {
        return $this->hasMany(TechCard::className(), ['product_id' => 'id']);
    }
}
