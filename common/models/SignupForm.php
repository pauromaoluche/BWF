<?php

namespace common\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name', 'email', 'password', 'confirmPassword'], 'required'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => Yii::t('backend', 'This email is already registered.')],
            [['password', 'confirmPassword'], 'string', 'max' => 40, 'min' => 4],
            [['confirmPassword'], 'compare', 'compareAttribute' => 'password'],
            [['password'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('backend', 'Name'),
            'last_name' => Yii::t('backend', 'Last Name'),
            'password' => Yii::t('backend', 'Password'),
            'confirmPassword' => Yii::t('backend', 'Confirm Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->scenario = 'signup';
            $user->attributes = $this->attributes;
            $user->status = '0';
            $user->save();
            return $user;
        }

        return null;
    }
}
