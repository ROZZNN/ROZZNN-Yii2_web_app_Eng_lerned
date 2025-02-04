<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agerating".
 *
 * @property int $id
 * @property string $agerating
 *
 * @property Books[] $books
 */
class Agerating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agerating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agerating'], 'required'],
            [['agerating'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agerating' => 'Agerating',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id_agerating' => 'id']);
    }
}
