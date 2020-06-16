<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tbreport;

/**
 * TbreportSearch represents the model behind the search form of `frontend\models\Tbreport`.
 */
class TbreportSearch extends Tbreport
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RepID', 'Ty'], 'integer'],
            [['RepName'], 'safe'],
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
        $query = Tbreport::find();

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
            'RepID' => $this->RepID,
            'Ty' => $this->Ty,
        ]);

        $query->andFilterWhere(['like', 'RepName', $this->RepName]);

        return $dataProvider;
    }
}
