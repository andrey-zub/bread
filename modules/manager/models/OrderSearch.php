<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\modules\admin\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'sum'], 'integer'],
            [['date_init', 'finish','manager_id',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                 'forcePageParam' => false,
                 'pageSizeParam' => false,
                'pageSize' => 5
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'manager_id' => $this->manager_id,
            'owner_id' => $this->owner_id,
            'date_init' => $this->date_init,
            'sum' => $this->sum,
        ]);

        $query->joinwith(['employee','owner']);


            $query->andFilterWhere(['like','employee.fio',$this->manager_id]);
            $query->andFilterWhere(['like','owner.name',$this->owner_id]);
        $query->andFilterWhere(['like', 'finish', $this->finish]);

        return $dataProvider;
    }
}
