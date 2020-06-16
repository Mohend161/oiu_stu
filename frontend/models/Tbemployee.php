<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbemployee".
 *
 * @property int $EmpID
 * @property string|null $EmpName
 * @property int|null $Lon
 * @property int|null $isopen
 * @property int|null $oldlon
 * @property int|null $oldisopen
 *
 * @property Tblistreturn[] $tblistreturns
 * @property Tblon[] $tblons
 */
class Tbemployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbemployee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Lon', 'isopen', 'oldlon', 'oldisopen'], 'integer'],
            [['EmpName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EmpID' => 'رقم لموظف',
            'EmpName' => 'اسم الموظف',
            'Lon' => 'حالة العهدة',
            'isopen' => 'العهدة مفتوحة',
            'oldlon' => 'Oldlon',
            'oldisopen' => 'Oldisopen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblistreturns()
    {
        return $this->hasMany(Tblistreturn::className(), ['EmpID' => 'EmpID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblons()
    {
        return $this->hasMany(Tblon::className(), ['EmpID' => 'EmpID']);
    }
}
