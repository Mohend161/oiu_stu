<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbyear".
 *
 * @property int $YearID
 * @property string|null $YearName
 *
 * @property Tblon[] $tblons
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
            'YearName' => 'العام',
        ];
    }

    /**
     * Gets query for [[Tblons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblons()
    {
        return $this->hasMany(Tblon::className(), ['det' => 'YearID']);
    }
}
