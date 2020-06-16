<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "typename".
 *
 * @property int $typeID
 * @property string|null $typename
 */
class Typename extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typename';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typename'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'typeID' => 'Type ID',
            'typename' => 'Typename',
        ];
    }
}
