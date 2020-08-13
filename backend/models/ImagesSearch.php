<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Images;

/**
 * ImagesSearch represents the model behind the search form of `app\models\Images`.
 */
class ImagesSearch extends Images
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'main', 'product_id', 'advert_id', 'saler_id'], 'integer'],
            [['path'], 'safe'],
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
        $query = Images::find()
            ->joinWith('product')
            ->joinWith('advert')
            ->joinWith('saler')
            ->where(['IS NOT', 'product_id', null]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->sort->attributes['product.name'] = [
            'asc' => ['product.name' => SORT_ASC],
            'desc' => ['product.name' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['saler.email'] = [
            'asc' => ['saler.email' => SORT_ASC],
            'desc' => ['saler.email' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['advert.link'] = [
            'asc' => ['advert.link' => SORT_ASC],
            'desc' => ['advert.link' => SORT_DESC]
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'main' => $this->main,
            'product_id' => $this->product_id,
            'advert_id' => $this->advert_id,
            'saler_id' => $this->saler_id,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
