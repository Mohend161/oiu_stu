<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbsectemp".
 *
 * @property int $EmpReID
 * @property string|null $EmpNaRe
 */
class Tbsectemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbsectemp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmpNaRe'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EmpReID' => 'Emp Re ID',
            'EmpNaRe' => 'Emp Na Re',
        ];
    }
}
