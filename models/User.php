<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $id_title
 * @property string $about
 * @property int $id_img
 * @property int $id_role
 *
 * @property BookUsers[] $bookUsers
 * @property Books[] $books
 * @property Img $img
 * @property Role $role
 * @property Title $title
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'password', 'id_title', 'about', 'id_img', 'id_role'], 'required'],
            [['id_title', 'id_img', 'id_role'], 'integer'],
            [['about'], 'string'],
            [['login', 'email', 'password'], 'string', 'max' => 255],
            [['login', 'email', 'password'], 'unique', 'targetAttribute' => ['login', 'email', 'password']],
            [['id_title'], 'exist', 'skipOnError' => true, 'targetClass' => Title::class, 'targetAttribute' => ['id_title' => 'id']],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
            [['id_img'], 'exist', 'skipOnError' => true, 'targetClass' => Img::class, 'targetAttribute' => ['id_img' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'id_title' => 'Id Title',
            'about' => 'About',
            'id_img' => 'Id Img',
            'id_role' => 'Id Role',
        ];
    }

    /**
     * Gets query for [[BookUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookUsers()
    {
        return $this->hasMany(BookUsers::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Img]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImg()
    {
        return $this->hasOne(Img::class, ['id' => 'id_img']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'id_role']);
    }

    /**
     * Gets query for [[Title]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitle()
    {
        return $this->hasOne(Title::class, ['id' => 'id_title']);
    }
}
