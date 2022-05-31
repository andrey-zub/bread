<?php

namespace app\modules\admin\models;

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
            'product_id' => 'Product ID',
            'owner_id' => 'Owner ID',
            'baker_id' => 'Baker ID',
            'manager_id' => 'Manager ID',
            'order_status' => 'Order Status',
        ];
    }

    /**
     * Gets query for [[Baker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaker()
    {
        return $this->hasOne(Employee::className(), ['id' => 'baker_id']);
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
}
