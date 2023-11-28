<?php

namespace common\models\search;

use common\models\db\City;
use common\models\db\Region;
use common\models\db\Survey;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class SurveySearch extends Survey
{
    public $region_id;

    private ?ActiveQuery $_query = null;


    public function rules(): array
    {
        return [
            [['id', 'city_id', 'gender', 'region_id', 'rating'], 'integer'],
            [['name', 'email', 'phone', 'created_at', 'updated_at'], 'string', 'max' => 255],
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

        $dataProvider->setSort([
            'defaultOrder' => ['created_at' => SORT_DESC],
            'attributes' => [

                'id' => [
                    'asc' => [self::tableName() . '.id' => SORT_ASC],
                    'desc' => [self::tableName() . '.id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'name' => [
                    'asc' => [self::tableName() . '.name' => SORT_ASC],
                    'desc' => [self::tableName() . '.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'email' => [
                    'asc' => [self::tableName() . '.email' => SORT_ASC],
                    'desc' => [self::tableName() . '.email' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'phone' => [
                    'asc' => [self::tableName() . '.phone' => SORT_ASC],
                    'desc' => [self::tableName() . '.phone' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'region_id' => [
                    'asc' => ['region.name' => SORT_ASC],
                    'desc' => ['region.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'city_id' => [
                    'asc' => ['city.name' => SORT_ASC],
                    'desc' => ['city.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'rating' => [
                    'asc' => [self::tableName() . '.rating' => SORT_ASC],
                    'desc' => [self::tableName() . '.rating' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'created_at' => [
                    'asc' => [self::tableName() . '.created_at' => SORT_ASC],
                    'desc' => [self::tableName() . '.created_at' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'updated_at' => [
                    'asc' => [self::tableName() . '.updated_at' => SORT_ASC],
                    'desc' => [self::tableName() . '.updated_at' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ]
        ]);

        $dataProvider->setPagination([
            'pageSize' => 30,
            'defaultPageSize' => 30,
            'forcePageParam' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'city_id' => $this->city_id,
            'gender' => $this->gender,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'phone', $this->phone]);

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

        if (!empty($this->region_id)) {
            $query->andWhere(['city.region_id' => $this->region_id]);
        }


        return $dataProvider;
    }

    public function getQuery(): ActiveQuery
    {
        if ($this->_query === null) {
            $this->_query = Survey::find();
            $this->_query
                ->leftJoin(City::tableName(), 'city.id = survey.id')
                ->leftJoin(Region::tableName(), 'region.id = city.id');
        }

        return $this->_query;
    }

    public function setQuery(ActiveQuery $query): void
    {
        $this->_query = $query;
    }


}
