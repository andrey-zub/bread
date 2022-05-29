<?php

namespace app\modules\manager\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\manager\models\OrderInfo;

/**
 * OrderInfoSearch represents the model behind the search form of `app\modules\manager\models\OrderInfo`.
 */
class OrderInfoSearch extends OrderInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'owner_id', 'baker_id'], 'integer'],
            [['product_id', 'owner_id', 'baker_id'], 'safe'],
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
            'pagination' => [
                 'forcePageParam' => false,
                 'pageSizeParam' => false,
                'pageSize' => 3,
              ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'owner_id' => $this->owner_id,
            'baker_id' => $this->baker_id,
        ]);

        $query->joinwith(['employee','owner','product']);

        $query->andFilterWhere(['like','emplooyee.fio',$this->baker_id]);
          $query->andFilterWhere(['like','owner.name',$this->owner_id]);
              $query->andFilterWhere(['like','product.product_name',$this->product_id]);
        return $dataProvider;
    }
}
