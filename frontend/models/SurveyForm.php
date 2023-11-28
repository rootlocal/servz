<?php

namespace frontend\models;

use common\models\db\City;
use common\models\db\Survey;
use Yii;
use yii\base\Model;

class SurveyForm extends Model
{
    private static array $_ratingItems = [];

    public $name;
    public $email;
    public $phone;
    public $city_id;
    public $rating;
    public $gender;
    public $comment;

    public function rules(): array
    {
        return [
            [['name', 'email', 'phone', 'comment'], 'trim'],
            [['name', 'email', 'phone', 'city_id', 'rating', 'gender', 'comment'], 'required'],
            [['city_id', 'gender'], 'default', 'value' => null],
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
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'city_id' => Yii::t('app', 'City'),
            'rating' => Yii::t('app', 'Порекомендовали бы ли вы нас?'),
            'gender' => Yii::t('app', 'Gender'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    public function attributeHints(): array
    {
        return [
            'rating' => 'Поставьте оценку от 1 до 10',
        ];
    }

    public function sendForm(): bool
    {
        $model = new Survey();
        $model->setAttributes($this->getAttributes());
        return $model->save(false);
    }

    public static function getRatingItems(): array
    {
        if (empty(self::$_ratingItems)) {
            for ($i = 1; $i <= 10; $i++) {
                self::$_ratingItems[$i] = $i;
            }
        }

        return self::$_ratingItems;
    }

}