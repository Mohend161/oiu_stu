<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbsection".
 *
 * @property int $TySectionID
 * @property string|null $TySectionName
 *
 * @property Tbfiltrate[] $tbfiltrates
 */
class Tbsection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbsection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TySectionName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TySectionID' => 'Ty Section ID',
            'TySectionName' => 'Ty Section Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbfiltrates()
    {
        return $this->hasMany(Tbfiltrate::className(), ['TySectionID' => 'TySectionID']);
    }
}
