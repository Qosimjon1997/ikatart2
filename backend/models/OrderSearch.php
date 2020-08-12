<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'basket_id'], 'integer'],
            [['date'], 'safe'],
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
    public function search($params, $isActive)
    {
        $query = Order::find()
            ->joinWith('basket')
            ->joinWith('basket.product.saler')
            ->joinWith('basket.user')
            ->joinWith('basket.product')->where(['isActive' => $isActive]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['basket.count'] = [
            'asc' => ['basket.count' => SORT_ASC],
            'desc' => ['basket.count' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['basket.product.saler.email'] = [
            'asc' => ['saler.email' => SORT_ASC],
            'desc' => ['saler.email' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['basket.user.email'] = [
            'asc' => ['user.email' => SORT_ASC],
            'desc' => ['user.email' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['basket.product.name'] = [
            'asc' => ['product.name' => SORT_ASC],
            'desc' => ['product.name' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'basket_id' => $this->basket_id,
            'basket.count' => $this->basket->count,
        ]);

        $query->andFilterWhere(['like', 'saler.email', $this->basket->product->saler->email])
            ->andFilterWhere(['like', 'user.email', $this->basket->user->email])
            ->andFilterWhere(['like', 'product.name', $this->basket->product->name]);

        return $dataProvider;
    }
}
