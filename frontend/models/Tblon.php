<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblon".
 *
 * @property int $LonID
 * @property string|null $LonDate
 * @property float|null $Maount
 * @property int|null $EmpID
 * @property int|null $TypeID
 * @property int|null $CollegeID
 * @property string|null $Note
 * @property int|null $Finish
 * @property string|null $Notes
 * @property int|null $CurrID
 * @property string|null $ProcedureDatfin
 * @property int|null $Archive
 * @property int|null $det
 * @property int|null $ID
 * @property int|null $UserID
 *
 * @property Tbfiltrate[] $tbfiltrates
 * @property Tbemployee $emp
 * @property Tbtypelan $type
 * @property Tbcollege $college
 * @property Tbcurrency $curr
 * @property Tbyear $det0
 */
class Tblon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['LonDate', 'Maount', 'EmpID', 'TypeID', 'CollegeID', 'CurrID','det'], 'required'],
            [['LonDate'], 'safe'],
            [['Maount'], 'number'],
            [['EmpID', 'TypeID', 'CollegeID', 'Finish', 'CurrID', 'Archive', 'det', 'ID', 'UserID'], 'integer'],
            [['Note', 'Notes'], 'string', 'max' => 50],
            [['EmpID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbemployee::className(), 'targetAttribute' => ['EmpID' => 'EmpID']],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbtypelan::className(), 'targetAttribute' => ['TypeID' => 'TypeID']],
            [['CollegeID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbcollege::className(), 'targetAttribute' => ['CollegeID' => 'CollegeID']],
            [['CurrID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbcurrency::className(), 'targetAttribute' => ['CurrID' => 'CurrID']],
            [['det'], 'exist', 'skipOnError' => true, 'targetClass' => Tbyear::className(), 'targetAttribute' => ['det' => 'YearID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           'LonID' => 'رقم العهده',
            'LonDate' => 'تاريخ العهده',
            'Maount' => 'المبلغ',
            'EmpID' => 'اسم الموظف',
            'TypeID' => 'نوع العهده',
            'CollegeID' => 'اسم الكلية',
            'Note' => 'الغرض منها',
            'Finish' => 'Finish',
            'Notes' => 'ملاحظات',
            'CurrID' => 'اسم العملة',
            'ProcedureDatfin' => 'Procedure Datfin',
            'Archive' => 'ارشيف',
            'det' => 'العام',
            'ID' => 'الرقم',
            'UserID' => 'اسم المستخدم',
        ];
    }

    /**
     * Gets query for [[Tbfiltrates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbfiltrates()
    {
        return $this->hasMany(Tbfiltrate::className(), ['LonID' => 'LonID']);
    }

    /**
     * Gets query for [[Emp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return $this->hasOne(Tbemployee::className(), ['EmpID' => 'EmpID']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Tbtypelan::className(), ['TypeID' => 'TypeID']);
    }

    /**
     * Gets query for [[College]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(Tbcollege::className(), ['CollegeID' => 'CollegeID']);
    }

    /**
     * Gets query for [[Curr]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurr()
    {
        return $this->hasOne(Tbcurrency::className(), ['CurrID' => 'CurrID']);
    }

    /**
     * Gets query for [[Det0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDet0()
    {
        return $this->hasOne(Tbyear::className(), ['YearID' => 'det']);
    }
}
