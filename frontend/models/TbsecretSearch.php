<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tbsecret;

/**
 * TbsecretSearch represents the model behind the search form of `frontend\models\Tbsecret`.
 */
class TbsecretSearch extends Tbsecret
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SecrtID', 'PayID'], 'integer'],
            [['PayDate', 'Notes'], 'safe'],
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
        $query = Tbsecret::find();

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
            'SecrtID' => $this->SecrtID,
            'PayID' => $this->PayID,
            'PayDate' => $this->PayDate,
        ]);

        $query->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
