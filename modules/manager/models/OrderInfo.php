<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "order_info".
 *
 * @property int|null $product_id
 * @property int|null $owner_id
 * @property int|null $order_id
 *
 * @property Owner $owner
 * @property Product $product
 * @property Order $order
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
            [['product_id', 'owner_id', 'order_id'], 'integer'],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['baker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['baker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ',
            'owner_id' => 'Owner ',
            'baker_id'=> 'Baker ',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
    }

    public function getOwnerName()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id'])->via(['name']);
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
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }


    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker_id']);
    }

    public function getEmployeeName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker_id'])->via(['fio']);
    }
}
