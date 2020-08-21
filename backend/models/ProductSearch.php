<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'oldprice', 'percent', 'Saler_id', 'category_id', 'isActive', 'mass_id'], 'integer'],
            [['name', 'info'], 'safe'],
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
    public function search($params, $isActive = null, $id = null)
    {
        $params = [];
        if(isset($isActive)){
            $params['isActive'] = $isActive;
        }

        if(isset($id)){
            $params['Saler_id'] = $id;
        }

        $query = Product::find()
            ->joinwith('saler')
            ->joinWith('category')
            ->joinWith('mass')
            ->where($params);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->sort->attributes['saler.email'] = [
            'asc' => ['saler.email' => SORT_ASC],
            'desc' => ['saler.email' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['category.name'] = [
            'asc' => ['category.name' => SORT_ASC],
            'desc' => ['category.name' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['mass.mass'] = [
            'asc' => ['mass.mass' => SORT_ASC],
            'desc' => ['mass.mass' => SORT_DESC]
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
            'oldprice' => $this->oldprice,
            'percent' => $this->percent,
            'Saler_id' => $this->Saler_id,
            'category_id' => $this->category_id,
            'isActive' => $this->isActive,
            'mass_id' => $this->mass_id,
            'mass.mass' => $this->mass->mass,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
