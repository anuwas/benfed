<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OtherReportResource;

/**
 * OtherReportResourceSearch represents the model behind the search form about `app\models\OtherReportResource`.
 */
class OtherReportResourceSearch extends OtherReportResource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['otherreport_resource_id', 'otherreport_id', 'active'], 'integer'],
            [['resourece_title', 'filename', 'created_date'], 'safe'],
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
        $query = OtherReportResource::find();

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
            'otherreport_resource_id' => $this->otherreport_resource_id,
            'otherreport_id' => $this->otherreport_id,
            'created_date' => $this->created_date,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'resourece_title', $this->resourece_title])
            ->andFilterWhere(['like', 'filename', $this->filename]);

        return $dataProvider;
    }
}
