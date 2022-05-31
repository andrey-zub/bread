<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "order_info".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $owner_id
 * @property int|null $baker_id
 * @property int|null $manager_id
 * @property string|null $order_status
 *
 * @property Employee $baker
 * @property Employee $manager
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
            [['order_status'], 'string', 'max' => 50],
            [['baker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['baker_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ',
            'owner_id' => 'Owner ',
            'baker_id' => 'Baker ',
            'manager_id' => 'Manager ',
            'order_status' => 'Order Status',
        ];
    }

    /**
     * Gets query for [[Baker]].
     *
     * @return \yii\db\ActiveQuery
     */

     public function getEmployee()
     {
         return $this->hasOne(Employee::className(), ['id' => 'baker_id']);
     }

     public function getEmployeeName()
     {
         return $this->hasOne(Employee::className(), ['id' => 'manager_id'])->via('fio');
     }
    public function getBaker()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker_id']);
    }

    public function getBakerName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker_id'])->via('fio');
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Employee::className(), ['id' => 'manager_id']);
    }

    public function getManagerName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'manager_id'])->via('fio');
    }

    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
    }

    public function getOwnerName()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id'])->via('name');
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getProductName()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id'])->via('product_name');
    }
}
