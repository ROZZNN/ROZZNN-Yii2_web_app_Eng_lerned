<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegistrationForm extends Model
{
    public string $login = '';
    public string $email = '';
    public string $password = "";
    public string $id_roll = "";
    public string $id_title = '';
    public int $id_img;
    public string|null $auth_key ='';



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // login, email, password and body are required
            [['login', 'email', 'password', 'id_role', 'id_title', 'id_img'], 'required'],
            [['login', 'email', 'id_role', 'id_title', 'auth_key'],'string', 'max' => 255 ],
            // email has to be a valid email address
            ['email', 'email'],
            // Ограничение длинны пароля
            ['password','string','min' => 8, 'max' => 34]
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
        ];
    }

    public function userRegister(): null|object
    {
        if ($this->validate()) {
            //create user
            $user = new User();
            $user->attributes = $this->attributes;
            //add role and title in user profill
            $user->id_role = Role::getIdRole('user');
            $user->id_title = Title::getIdTitle('Книжный новичок');
            //hashing password and add auth_key
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            //add avatar
            $user->id_img = Img::getIdImg('1');

            if (! $user->save()) 
            {
                Yii::debug($user->errors);
            }

        }
        return $user ?? false;
    }
}
