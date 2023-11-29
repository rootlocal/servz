<?php

namespace common\models\search;

use common\models\db\City;
use common\models\db\Region;
use common\models\db\Survey;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\Expression;

class SurveySearch extends Survey
{
    public $region_id;
    public ?string $search = null;

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
                    'asc' => ['survey.id' => SORT_ASC],
                    'desc' => ['survey.id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'name' => [
                    'asc' => ['survey.name' => SORT_ASC],
                    'desc' => ['survey.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'email' => [
                    'asc' => ['survey.email' => SORT_ASC],
                    'desc' => ['survey.email' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'phone' => [
                    'asc' => ['survey.phone' => SORT_ASC],
                    'desc' => ['survey.phone' => SORT_DESC],
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
                    'asc' => ['survey.rating' => SORT_ASC],
                    'desc' => ['survey.rating' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'created_at' => [
                    'asc' => ['survey.created_at' => SORT_ASC],
                    'desc' => ['survey.created_at' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'updated_at' => [
                    'asc' => ['survey.updated_at' => SORT_ASC],
                    'desc' => ['survey.updated_at' => SORT_DESC],
                    'default' => SORT_ASC,
                ],

                'gender' => [
                    'asc' => ['survey.gender' => SORT_ASC],
                    'desc' => ['survey.gender' => SORT_DESC],
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
            'survey.city_id' => $this->city_id,
            'survey.gender' => $this->gender,
            'survey.rating' => $this->rating,
        ]);

        $query->andFilterWhere(['ilike', 'survey.name', $this->name])
            ->andFilterWhere(['ilike', 'survey.email', $this->email])
            ->andFilterWhere(['ilike', 'survey.phone', $this->phone]);

        if (!empty($this->created_at)) {
            $start = strtotime($this->created_at . ' 00:00:01');
            $stop = strtotime($this->created_at . ' 23:59:59');

            if ($start !== false) {
                $query->andWhere(['>=', 'survey.created_at', $start]);
            }

            if ($stop !== false) {
                $query->andWhere(['<=', 'survey.created_at', $stop]);
            }
        }

        if (!empty($this->updated_at)) {
            $start = strtotime($this->updated_at . ' 00:00:01');
            $stop = strtotime($this->updated_at . ' 23:59:59');

            if ($start !== false) {
                $query->andWhere(['>=', 'survey.updated_at', $start]);
            }

            if ($stop !== false) {
                $query->andWhere(['<=', 'survey.updated_at', $stop]);
            }
        }

        if (!empty($this->region_id)) {
            $query->andWhere(['region.id' => $this->region_id]);
        }

        if (!empty($this->search)) {
            $expression = new Expression('survey.name || survey.phone || survey.email || city.name || region.name');
            $query->andWhere(['ilike', $expression, '%' . $this->search . '%', false]);
        }


        return $dataProvider;
    }

    public function getQuery(): ActiveQuery
    {
        if ($this->_query === null) {
            $this->_query = Survey::find()->alias('survey')
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
