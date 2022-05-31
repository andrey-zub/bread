<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property string|null $owner_name
 * @property string|null $owner_email
 * @property string|null $status
 * @property int|null $pay_sum
 * @property string|null $pay_id
 * @property int $manager_id
 * @property int $boss_id
 *
 * @property Employee $manager
 * @property Employee $boss
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
            [['pay_sum', 'manager_id', 'boss_id'], 'integer'],
            [['manager_id', 'boss_id'], 'required'],
            [['owner_name', 'owner_email', 'status'], 'string', 'max' => 50],
            [['pay_id'], 'string', 'max' => 255],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['boss_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['boss_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_name' => 'Owner Name',
            'owner_email' => 'Owner Email',
            'status' => 'Status',
            'pay_sum' => 'Pay Sum',
            'pay_id' => 'Pay ID',
            'manager_id' => 'Manager ',
            'boss_id' => 'Boss ',
        ];
    }


    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'manager_id']);
    }
    public function getEmployeeName()
    {
        return $this->hasOne(Employee::className(), ['id' => 'manager_id'])->via('fio');
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
     * Gets query for [[Boss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBoss()
    {
        return $this->hasOne(Employee::className(), ['id' => 'boss_id']);
    }
}
