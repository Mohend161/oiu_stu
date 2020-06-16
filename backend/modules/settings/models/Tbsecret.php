<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbsecret".
 *
 * @property int $SecrtID
 * @property string|null $PayDate
 * @property int $PayID
 * @property string|null $Notes
 */
class Tbsecret extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbsecret';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PayDate'], 'safe'],
            [['PayID'], 'required'],
            [['PayID'], 'integer'],
            [['Notes'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SecrtID' => 'Secrt ID',
            'PayDate' => 'Pay Date',
            'PayID' => 'Pay ID',
            'Notes' => 'Notes',
        ];
    }
}
