<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property string|null $owner-name
 * @property string|null $owner-email
 * @property string|null $stasus
 * @property int|null $pay_sum
 * @property string|null $pay_id
 * @property int|null $manager_ID
 * @property int $boss_ID
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
            [['boss_ID'], 'required'],
            [['owner-name', 'owner-email', 'stasus'], 'string', 'max' => 50],
            [['pay_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'owner-name' => 'Owner Name',
            'owner-email' => 'Owner Email',
            'stasus' => 'Stasus',
            'pay_sum' => 'Pay Sum',
            'pay_id' => 'Pay ID',
            'manager_ID' => 'Manager ID',
            'boss_ID' => 'Boss ID',
        ];
    }




    
}
