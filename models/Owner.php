<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 *
 * @property Order[] $orders
 * @property OrderInfo[] $orderInfos
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[OrderInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['owner_id' => 'id']);
    }
}
