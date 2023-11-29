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
    public $search;

    private ?ActiveQuery $_query = null;


    public function rules(): array
    {
        return [
            [['id', 'city_id', 'gender', 'region_id', 'rating'], 'integer'],
            [['name', 'email', 'phone', 'created_at', 'updated_at', 'search'], 'string', 'max' => 255],
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

                'gender' => [
                    'asc' => [self::tableName() . '.gender' => SORT_ASC],
                    'desc' => [self::tableName() . '.gender' => SORT_DESC],
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
            self::tableName() . '.city_id' => $this->city_id,
            self::tableName() . '.gender' => $this->gender,
            self::tableName() . '.rating' => $this->rating,
        ]);

        $query->andFilterWhere(['ilike', self::tableName() . '.name', $this->name])
            ->andFilterWhere(['ilike', self::tableName() . '.email', $this->email])
            ->andFilterWhere(['ilike', self::tableName() . '.phone', $this->phone]);

        if (!empty($this->created_at)) {
            $start = strtotime($this->created_at . ' 00:00:01');
            $stop = strtotime($this->created_at . ' 23:59:59');

            if ($start !== false) {
                $query->andWhere(['>=', self::tableName() . '.created_at', $start]);
            }

            if ($stop !== false) {
                $query->andWhere(['<=', self::tableName() . '.created_at', $stop]);
            }
        }

        if (!empty($this->updated_at)) {
            $start = strtotime($this->updated_at . ' 00:00:01');
            $stop = strtotime($this->updated_at . ' 23:59:59');

            if ($start !== false) {
                $query->andWhere(['>=', self::tableName() . '.updated_at', $start]);
            }

            if ($stop !== false) {
                $query->andWhere(['<=', self::tableName() . '.updated_at', $stop]);
            }
        }

        if (!empty($this->region_id)) {
            $query->andWhere(['region.id' => $this->region_id]);
        }

        if (!empty($this->search)) {
            $query->andWhere(['ilike', self::tableName() . '.name || '
                . self::tableName() . '.phone || '
                . self::tableName() . '.email || '
                . 'city.name ||'
                . 'region.name',
                '%' . $this->search . '%',
                false]);
        }


        return $dataProvider;
    }

    public function getQuery(): ActiveQuery
    {
        if ($this->_query === null) {
            $this->_query = Survey::find()
                ->leftJoin(City::tableName() . ' as city', 'city.id = survey.city_id')
                ->leftJoin(Region::tableName() . ' as region', 'region.id = city.region_id');
        }

        return $this->_query;
    }

    public function setQuery(ActiveQuery $query): void
    {
        $this->_query = $query;
    }


}
