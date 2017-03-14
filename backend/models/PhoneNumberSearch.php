<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhoneNumber;

/**
 * PhoneNumberSearch represents the model behind the search form about `app\models\PhoneNumber`.
 */
class PhoneNumberSearch extends PhoneNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_id'], 'integer'],
            [['cell_number'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = PhoneNumber::find();

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
            'id' => $this->id,
            'person_id' => $this->person_id,
        ]);

        $query->andFilterWhere(['like', 'cell_number', $this->cell_number]);

        return $dataProvider;
    }
}
