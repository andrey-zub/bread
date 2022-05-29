<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $boss_id
 * @property int $manager_id
 *
 * @property Order $order
 * @property Employee $manager
 * @property Boss $boss
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'manager_id'], 'required'],
            [['id', 'order_id', 'boss_id', 'manager_id'], 'integer'],
            [['id'], 'unique'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['boss_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['boss_id' => 'boss_id']],
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
            'boss_id' => 'Boss ID',
            'manager_id' => 'Manager ID',
        ];
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

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'manager_id']);
    }

    /**
     * Gets query for [[Boss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'boss_id'])->via(['fio']);
    }
}
