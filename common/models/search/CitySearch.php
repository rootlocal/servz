<?php

namespace common\models\search;

use common\models\db\City;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class CitySearch extends City
{
    private ?ActiveQuery $_query = null;


    public function rules(): array
    {
        return [
            [['id', 'region_id'], 'integer'],
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params = []): ActiveDataProvider
    {
        $query = $this->getQuery();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name]);

        if (!empty($this->created_at)) {
            $start = strtotime($this->created_at . ' 00:00:01');
            $stop = strtotime($this->created_at . ' 23:59:59');

            if ($start !== false) {
                $query->andFilterWhere(['>=', self::tableName() . '.created_at', $start]);
            }

            if ($stop !== false) {
                $query->andFilterWhere(['<=', self::tableName() . '.created_at', $stop]);
            }
        }

        if (!empty($this->updated_at)) {
            $start = strtotime($this->updated_at . ' 00:00:01');
            $stop = strtotime($this->updated_at . ' 23:59:59');

            if ($start !== false) {
                $query->andFilterWhere(['>=', self::tableName() . '.updated_at', $start]);
            }

            if ($stop !== false) {
                $query->andFilterWhere(['<=', self::tableName() . '.updated_at', $stop]);
            }
        }

        return $dataProvider;
    }

    /**
     * @return ActiveQuery
     */
    public function getQuery(): ActiveQuery
    {
        if ($this->_query === null) {
            $this->_query = City::find();
        }

        return $this->_query;
    }

    /**
     * @param ActiveQuery $query
     */
    public function setQuery(ActiveQuery $query): void
    {
        $this->_query = $query;
    }


}
