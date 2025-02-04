<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "difficult".
 *
 * @property int $id
 * @property string $difficult
 *
 * @property BookUsers[] $bookUsers
 */
class Difficult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'difficult';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['difficult'], 'required'],
            [['difficult'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'difficult' => 'Difficult',
        ];
    }

    /**
     * Gets query for [[BookUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookUsers()
    {
        return $this->hasMany(BookUsers::class, ['id_dificult' => 'id']);
    }
}
