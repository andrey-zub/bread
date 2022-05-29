<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "baker_info".
 *
 * @property int $order_info_id
 * @property int|null $baker
 * @property int|null $product
 * @property int|null $technolog
 * @property string|null $recipe
 *
 * @property Employee $baker0
 */
class BakerInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'baker_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_info_id'], 'required'],
            [['order_info_id', 'baker', 'product', 'technolog'], 'integer'],
            [['recipe'], 'string'],
            [['order_info_id'], 'unique'],
            [['baker'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['baker' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_info_id' => 'Order Info ID',
            'baker' => 'Baker',
            'product' => 'Product',
            'technolog' => 'Technolog',
            'recipe' => 'Recipe',
        ];
    }

    /**
     * Gets query for [[Baker0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaker0()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker']);
    }
}
