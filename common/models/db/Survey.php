<?php

namespace common\models\db;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%survey}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $city_id
 * @property int $rating
 * @property int $gender
 * @property int $created_at
 * @property int $updated_at
 * @property string $comment
 *
 * @property City $city
 */
class Survey extends ActiveRecord
{
    public const GENDER_TYPE_FEMALE = 1;
    public const GENDER_TYPE_MALE = 2;


    public static function tableName(): string
    {
        return '{{%survey}}';
    }

    public function rules(): array
    {
        return [
            [['name', 'email', 'phone', 'comment'], 'trim'],
            [['name', 'email', 'phone', 'city_id', 'rating', 'gender', 'comment'], 'required'],
            [['city_id', 'gender', 'rating'], 'integer'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['comment'], 'safe'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'city_id' => Yii::t('app', 'City'),
            'rating' => Yii::t('app', 'Rating'),
            'gender' => Yii::t('app', 'Gender'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'comment' => Yii::t('app', 'Comment'),
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
     * Gets query for [[City]].
     *
     * @return ActiveQuery
     */
    public function getCity(): ActiveQuery
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    public static function getGenderTypesItems(): array
    {
        return [
            self::GENDER_TYPE_FEMALE => Yii::t('app', 'Female'),
            self::GENDER_TYPE_MALE => Yii::t('app', 'Male'),
        ];
    }

    public static function getGenderTypeItem(int $type): string
    {
        $items = self::getGenderTypesItems();
        return array_key_exists($type, $items) ? $items[$type] : Yii::t('app', 'Incorrect value');
    }
}
