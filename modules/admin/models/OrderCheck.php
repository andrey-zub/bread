<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order_check".
 *
 * @property int $id
 * @property int|null $owner_id
 * @property int|null $manager_id
 * @property string|null $date_init
 * @property string|null $finish
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $billid
 * @property int|null $amount
 */
class OrderCheck extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_check';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'manager_id', 'amount'], 'integer'],
            [['date_init'], 'safe'],
            [['finish', 'name', 'phone', 'email'], 'string', 'max' => 50],
            [['billid'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'manager_id' => 'Manager ID',
            'date_init' => 'Date Init',
            'finish' => 'Finish',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'billid' => 'Billid',
            'amount' => 'Amount',
        ];
    }
}
