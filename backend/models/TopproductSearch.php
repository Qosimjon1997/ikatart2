<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Topproduct;

/**
 * TopproductSearch represents the model behind the search form of `app\models\Topproduct`.
 */
class TopproductSearch extends Topproduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'isActive', 'toptype_id', 'product_id'], 'integer'],
            [['startdate'], 'safe'],
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
        $query = Topproduct::find()
            ->joinWith('product')
            ->joinWith('toptype');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->sort->attributes['product.name'] = [
            'asc' => ['product.name' => SORT_ASC],
            'desc' => ['product.name' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['toptype.day'] = [
            'asc' => ['toptype.day' => SORT_ASC],
            'desc' => ['toptype.day' => SORT_DESC]
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'isActive' => $this->isActive,
            'startdate' => $this->startdate,
            'toptype_id' => $this->toptype_id,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product->name])
            ->andFilterWhere(['like', 'toptype.day', $this->toptype->name]);

        return $dataProvider;
    }
}
