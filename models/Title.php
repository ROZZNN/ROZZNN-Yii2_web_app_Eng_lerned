<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "title".
 *
 * @property int $id
 * @property string $title
 *
 * @property User[] $users
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_title' => 'id']);
    }
    public static function getIdTitle(string $title): int
    {
        return self::findOne(['title' => $title])->id;
    }
}
