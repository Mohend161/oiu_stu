<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblistreturn".
 *
 * @property int $RetID
 * @property int $PayID
 * @property int|null $EmpID
 * @property float|null $Amount
 * @property int|null $ItemID
 * @property int|null $IsPrint
 * @property string|null $Notes
 * @property int|null $UserID
 * @property int|null $Accept
 *
 * @property Tbitem $item
 * @property Tbemployee $emp
 * @property Tbsecret $pay
 */
class Tblistreturn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblistreturn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PayID'], 'required'],
            [['PayID', 'EmpID', 'ItemID', 'IsPrint', 'UserID', 'Accept'], 'integer'],
            [['Amount'], 'number'],
            [['Notes'], 'string', 'max' => 50],
            [['ItemID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbitem::className(), 'targetAttribute' => ['ItemID' => 'ItemID']],
            [['EmpID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbemployee::className(), 'targetAttribute' => ['EmpID' => 'EmpID']],
            [['PayID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbsecret::className(), 'targetAttribute' => ['PayID' => 'PayID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RetID' => 'Ret ID',
            'PayID' => 'Pay ID',
            'EmpID' => 'Emp ID',
            'Amount' => 'Amount',
            'ItemID' => 'Item ID',
            'IsPrint' => 'Is Print',
            'Notes' => 'Notes',
            'UserID' => 'User ID',
            'Accept' => 'Accept',
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Tbitem::className(), ['ItemID' => 'ItemID']);
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
     * Gets query for [[Pay]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPay()
    {
        return $this->hasOne(Tbsecret::className(), ['PayID' => 'PayID']);
    }
}
