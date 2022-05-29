<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "tech_card".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $technolog_id
 * @property string|null $recipe
 *
 * @property Product $product
 * @property Employee $technolog
 */
class TechCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tech_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'product_id', 'technolog_id'], 'integer'],
            [['recipe'], 'string'],
            [['id'], 'unique'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['technolog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['technolog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ',
            'technolog_id' => 'Technolog ',
            'recipe' => 'Recipe',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getProductName()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id'])->via(['product_name']);
    }

    /**
     * Gets query for [[Technolog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'technolog_id']);
    }

    public function getEmployeeName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'technolog_id'])->via(['fio']);
    }
}