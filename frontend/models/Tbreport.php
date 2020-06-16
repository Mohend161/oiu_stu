<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbreport".
 *
 * @property int $RepID
 * @property string|null $RepName
 * @property int|null $Ty
 */
class Tbreport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbreport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ty'], 'integer'],
            [['RepName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RepID' => 'Rep ID',
            'RepName' => 'Rep Name',
            'Ty' => 'Ty',
        ];
    }
}
