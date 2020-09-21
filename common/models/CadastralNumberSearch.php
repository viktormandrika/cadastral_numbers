<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CadastralNumber;

/**
 * CadastralNumberSearch represents the model behind the search form of `common\models\CadastralNumber`.
 */
class CadastralNumberSearch extends CadastralNumber
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cadastralNumber', 'address'], 'safe'],
            [['price', 'area'], 'number'],
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
        $query = CadastralNumber::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        $this->load( $params );

        if (!$this->validate()) {
            return $dataProvider;
        }


        $query->andFilterWhere( ['like', 'cadastralNumber', $this->cadastralNumber] );


        return $dataProvider;
    }
}
