<?php

namespace app\models;

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
 * @property int|null $manager_ID
 * @property int|null $boss_ID
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
            [['pay_sum', 'manager_ID', 'boss_ID'], 'integer'],
            [['owner_name', 'owner_email', 'status'], 'string', 'max' => 50],
            [['pay_id'], 'string', 'max' => 255],
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
            'manager_ID' => 'Manager ID',
            'boss_ID' => 'Boss ID',
        ];
    }
}
