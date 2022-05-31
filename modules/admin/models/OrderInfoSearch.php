<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\OrderInfo;

/**
 * OrderInfoSearch represents the model behind the search form of `app\modules\admin\models\OrderInfo`.
 */
class OrderInfoSearch extends OrderInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'product_id', 'owner_id', 'baker_id', 'manager_id'], 'integer'],
            [['order_status'], 'safe'],
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
        $query = OrderInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'owner_id' => $this->owner_id,
            'baker_id' => $this->baker_id,
            'manager_id' => $this->manager_id,
        ]);

        $query->andFilterWhere(['like', 'order_status', $this->order_status]);

        return $dataProvider;
    }
}
