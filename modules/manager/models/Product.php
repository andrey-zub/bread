<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $product_name
 * @property int|null $price
 * @property int|null $counts
 *
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
            'product_name' => 'Product Name',
            'price' => 'Price',
            'counts' => 'Counts',
        ];
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
