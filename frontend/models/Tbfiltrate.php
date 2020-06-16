<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbfiltrate".
 *
 * @property int $FiltrID
 * @property int|null $LonID
 * @property int|null $TySectionID
 * @property string|null $ProcedureDate
 * @property float|null $Money
 * @property int|null $Archive
 * @property int|null $YearID
 *
 * @property Tblon $lon
 * @property Tbsection $tySection
 */
class Tbfiltrate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbfiltrate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'TySectionID', 'Archive', 'YearID'], 'integer'],
            [['ProcedureDate'], 'safe'],
            [['Money'], 'number'],
            [['LonID'], 'exist', 'skipOnError' => true, 'targetClass' => Tblon::className(), 'targetAttribute' => ['LonID' => 'LonID']],
            [['TySectionID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbsection::className(), 'targetAttribute' => ['TySectionID' => 'TySectionID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'FiltrID' => 'رقم البند',
            'LonID' => 'رقم العهده',
            'TySectionID' => 'اسم البند',
            'ProcedureDate' => 'تاريخ الاجراء',
            'Money' => 'المبلغ',
            'Archive' => 'Archive',
            'YearID' => 'Year ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLon()
    {
        return $this->hasOne(Tblon::className(), ['LonID' => 'LonID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTySection()
    {
        return $this->hasOne(Tbsection::className(), ['TySectionID' => 'TySectionID']);
    }
}
