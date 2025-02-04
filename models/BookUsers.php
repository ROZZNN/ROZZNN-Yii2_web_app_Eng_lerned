<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_users".
 *
 * @property int $id_book
 * @property int $id_user
 * @property int $status
 * @property int $id_dificult
 *
 * @property Books $book
 * @property Difficult $dificult
 * @property User $user
 */
class BookUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'id_user', 'status', 'id_dificult'], 'required'],
            [['id_book', 'id_user', 'status', 'id_dificult'], 'integer'],
            [['id_dificult'], 'exist', 'skipOnError' => true, 'targetClass' => Difficult::class, 'targetAttribute' => ['id_dificult' => 'id']],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['id_book' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_book' => 'Id Book',
            'id_user' => 'Id User',
            'status' => 'Status',
            'id_dificult' => 'Id Dificult',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Books::class, ['id' => 'id_book']);
    }

    /**
     * Gets query for [[Dificult]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDificult()
    {
        return $this->hasOne(Difficult::class, ['id' => 'id_dificult']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
