<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbyear".
 *
 * @property int $YearID
 * @property string|null $YearName
 */
class Tbyear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbyear';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['YearID'], 'required'],
            [['YearID'], 'integer'],
            [['YearName'], 'string', 'max' => 50],
            [['YearID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'YearID' => 'Year ID',
            'YearName' => 'Year Name',
        ];
    }
}
