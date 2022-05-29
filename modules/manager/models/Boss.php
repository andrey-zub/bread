<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "boss".
 *
 * @property int $boss_id
 * @property string|null $phone
 * @property string|null $email
 *
 * @property Employee $boss
 * @property Report[] $reports
 */
class Boss extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boss';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['boss_id'], 'required'],
            [['boss_id'], 'integer'],
            [['phone', 'email'], 'string', 'max' => 50],
            [['boss_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['boss_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'boss_id' => 'Boss ID',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
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

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['boss_id' => 'boss_id']);
    }
}
