<?php

namespace app\modules\manager\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $fio
 * @property string|null $position
 * @property string|null $phone
 * @property string|null $passport
 *
 * @property Boss[] $bosses
 * @property TechCard[] $techCards
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['position'], 'string'],
            [['fio', 'phone', 'passport'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'position' => 'Position',
            'phone' => 'Phone',
            'passport' => 'Passport',
        ];
    }

    /**
     * Gets query for [[Bosses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBosses()
    {
        return $this->hasMany(Boss::className(), ['boss_id' => 'id']);
    }

    /**
     * Gets query for [[TechCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechCards()
    {
        return $this->hasMany(TechCard::className(), ['technolog_id' => 'id']);
    }
}
