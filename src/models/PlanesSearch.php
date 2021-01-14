<?php

namespace vendor\gngstyle\project\src\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\gngstyle\project\src\models\Planes;

/**
 * PlanesSearch represents the model behind the search form of `vendor\gngstyle\project\src\models\Planes`.
 */
class PlanesSearch extends Planes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plane_id', 'plane_adet'], 'integer'],
            [['plane_model'], 'safe'],
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
        $query = Planes::find();

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
            'plane_id' => $this->plane_id,
            'plane_adet' => $this->plane_adet,
        ]);

        $query->andFilterWhere(['like', 'plane_model', $this->plane_model]);

        return $dataProvider;
    }
}
