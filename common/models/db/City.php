<?php

namespace common\models\db;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property int $id
 * @property string|null $name
 * @property int $region_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Region $region
 * @property Survey[] $surveys
 */
class City extends ActiveRecord
{
    private static array $_items = [];

    public static function tableName(): string
    {
        return '{{%city}}';
    }

    public function rules(): array
    {
        return [
            [['name'], 'trim'],
            [['region_id',], 'required'],
            [['region_id'], 'default', 'value' => null],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name', 'region_id'], 'unique', 'targetAttribute' => ['name', 'region_id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'region_id' => Yii::t('app', 'Region'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors(): array
    {
        return [
            'timestamp_behavior' => [
                'class' => TimestampBehavior::class,
            ],

        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQuery
     */
    public function getRegion(): ActiveQuery
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Surveys]].
     *
     * @return ActiveQuery
     */
    public function getSurveys(): ActiveQuery
    {
        return $this->hasMany(Survey::class, ['city_id' => 'id']);
    }

    /** Возращает массив всех городов для select-а */
    public static function getItems(): array
    {
        if (empty(self::$_items)) {
            $query = self::find()
                ->alias('city')
                ->joinWith('region as region')->select(
                    new Expression("city.id as key, concat(city.name, ' (', region.name, ')') as value")
                )
                ->orderBy(['city.name' => SORT_ASC, 'region.name' => SORT_ASC,])
                ->asArray()->all();

            self::$_items = ArrayHelper::map($query, 'key', 'value');
        }

        return self::$_items;
    }

    public static function getItem(int $id)
    {
        $items = self::getItems();
        return array_key_exists($id, $items) ? $items[$id] : Yii::t('app', 'Incorrect value');
    }

}
