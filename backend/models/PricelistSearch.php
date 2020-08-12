<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pricelist;

/**
 * PricelistSearch represents the model behind the search form of `app\models\Pricelist`.
 */
class PricelistSearch extends Pricelist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'mass_id', 'posttype_id', 'zone_id'], 'integer'],
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
        $query = Pricelist::find()->joinWith('zone')->joinWith('mass')->joinWith('posttype');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->sort->attributes['zone.zone'] = [
            'asc' => ['zone.zone' => SORT_ASC],
            'desc' => ['zone.zone' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['mass.mass'] = [
            'asc' => ['mass.mass' => SORT_ASC],
            'desc' => ['mass.mass' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['posttype.name'] = [
            'asc' => ['posttype.name' => SORT_ASC],
            'desc' => ['posttype.name' => SORT_DESC]
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'mass_id' => $this->mass_id,
            'posttype_id' => $this->posttype_id,
            'zone_id' => $this->zone_id,
        ]);

        $query->andFilterWhere(['like', 'zone.zone', $this->zone->zone])
            ->andFilterWhere(['like', 'posttype.name', $this->posttype->name])
            ->andFilterWhere(['like', 'zone.zone', $this->mass->mass]);

        return $dataProvider;
    }
}
