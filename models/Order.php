<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $manager_id
 * @property int|null $owner_id
 * @property string|null $date_init
 * @property int|null $sum
 * @property string $finish
 *
 * @property Employee $manager
 * @property Owner $owner
 * @property OrderInfo $orderInfo
 * @property Report[] $reports
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'finish'], 'required'],
            [['id', 'manager_id', 'owner_id', 'sum'], 'integer'],
            [['date_init'], 'safe'],
            [['finish'], 'string'],
            [['id'], 'unique'],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['owner_id' => 'id']],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manager_id' => 'Manager ID',
            'owner_id' => 'Owner ID',
            'date_init' => 'Date Init',
            'sum' => 'Sum',
            'finish' => 'Finish',
        ];
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

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
    }

    /**
     * Gets query for [[OrderInfo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfo()
    {
        return $this->hasOne(OrderInfo::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['order_id' => 'id']);
    }
}
