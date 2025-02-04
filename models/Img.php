<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "img".
 *
 * @property int $id
 * @property string $route
 *
 * @property User[] $users
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route'], 'required'],
            [['route'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_img' => 'id']);
    }
    public static function getIdImg(int $id): string
    {
        return self::findOne(['id' => $id])->route;
    }
}
