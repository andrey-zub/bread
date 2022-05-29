<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $manager_id
 * @property string|null $date_init
 * @property int|null $sum
 * @property string|null $finish
 *
 * @property Employee $manager

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
            [['id'], 'required'],
            [['id', 'manager_id','owner_id', 'sum'], 'integer'],
            [['date_init'], 'safe'],
            [['finish'], 'string'],
            [['id'], 'unique'],
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
            'owner_id'=>'Owner',
            'manager_id' => 'Manager ',
            'date_init' => 'Date Init',
            'sum' => 'Sum',
            'finish' => 'Finish',
        ];
    }

    public function getEmployee(){
      return $this->hasOne(Employee::className(),['id'=>'manager_id']);
    }

    public function getOwner(){
      return $this->hasOne(Owner::className(),['id'=>'Owner_id']);
    }

    public function getOwnerName(){
      return $this->hasOne(Owner::className(),['id'=>'Owner_id'])->via('name');
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

    public function getManagerName(){
      return $this->hasOne(Employee::className(),['id'=>'manager_id'])->via('fio');
    }




}
