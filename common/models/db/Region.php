<?php

namespace common\models\db;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property City[] $cities
 */
class Region extends ActiveRecord
{
    private static array $_items = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%region}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors(): array
    {
        return [
            'timestamp_behavior' => [
                'class' => TimestampBehavior::class,
            ],

        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return ActiveQuery
     */
    public function getCities(): ActiveQuery
    {
        return $this->hasMany(City::class, ['region_id' => 'id']);
    }

    /** Возращает массив всех регионов для select-а */
    public static function getItems(): array
    {
        if (empty(self::$_items)) {
            $query = self::find()->select(['id', 'name'])
                ->orderBy([self::tableName() . '.name' => SORT_ASC])
                ->asArray()->all();
            self::$_items = ArrayHelper::map($query, 'id', 'name');
        }

        return self::$_items;
    }

    public static function getItem(int $id)
    {
        $items = self::getItems();
        return array_key_exists($id, $items) ? $items[$id] : Yii::t('app', 'Incorrect value');
    }
}
