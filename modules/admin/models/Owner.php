<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property int $id
 * @property int|null $owner_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 *
 * @property OrderCheck $owner
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
            [['owner_id'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 50],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderCheck::className(), 'targetAttribute' => ['owner_id' => 'owner_id']],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(OrderCheck::className(), ['owner_id' => 'owner_id']);
    }
}
