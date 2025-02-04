<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int $id_user
 * @property string $headline
 * @property string $author
 * @property int $type
 * @property int $id_agerating
 *
 * @property Agerating $agerating
 * @property BookUsers[] $bookUsers
 * @property User $user
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'headline', 'author', 'type', 'id_agerating'], 'required'],
            [['id_user', 'type', 'id_agerating'], 'integer'],
            [['headline'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 25],
            [['id_agerating'], 'exist', 'skipOnError' => true, 'targetClass' => Agerating::class, 'targetAttribute' => ['id_agerating' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'headline' => 'Headline',
            'author' => 'Author',
            'type' => 'Type',
            'id_agerating' => 'Id Agerating',
        ];
    }

    /**
     * Gets query for [[Agerating]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgerating()
    {
        return $this->hasOne(Agerating::class, ['id' => 'id_agerating']);
    }

    /**
     * Gets query for [[BookUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookUsers()
    {
        return $this->hasMany(BookUsers::class, ['id_book' => 'id']);
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
