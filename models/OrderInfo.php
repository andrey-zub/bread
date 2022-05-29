<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_info".
 *
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $owner_id
 * @property int|null $baker_id
 * @property int|null $manager_id
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'owner_id', 'baker_id', 'manager_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'owner_id' => 'Owner ID',
            'baker_id' => 'Baker ID',
            'manager_id' => 'Manager ID',
        ];
    }
}