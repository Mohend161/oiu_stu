<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbcurrency".
 *
 * @property int $CurrID
 * @property string|null $CurrName
 *
 * @property Tblon[] $tblons
 */
class Tbcurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbcurrency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CurrName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CurrID' => 'Curr ID',
            'CurrName' => 'Curr Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblons()
    {
        return $this->hasMany(Tblon::className(), ['CurrID' => 'CurrID']);
    }
}
