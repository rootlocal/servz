<?php

namespace common\models\forms;

use common\models\db\User;
use Yii;
use yii\base\Model;

/**
 * Class LoginForm
 *
 * @author Alexander Zakharov <sys@eml.ru>
 * @package common\models\dto
 *
 * @property-read null|User $user
 */
class LoginForm extends Model
{
    /** @var string|null */
    public ?string $username = null;
    /** @var string|null */
    public ?string $password = null;
    /** @var bool|null */
    public ?bool $rememberMe = true;

    /** @var User|null */
    private ?User $_user = null;


    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLabels(): array
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'rememberMe' => Yii::t('app', 'Remember Me'),
        ];
    }

    /**
     * @return array
     */
    public function attributeHints(): array
    {
        return [
            'username' => Yii::t('app', 'Demo Username: {name}', ['name' => 'admin']),
            'password' => Yii::t('app', 'Demo Password: {password}', ['password' => 'admin']),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array|null $params the additional name-value pairs given in the rule
     */
    public function validatePassword(string $attribute, ?array $params = [])
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login(): bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser(): ?User
    {
        if (!empty($this->username) && $this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
