<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbitem".
 *
 * @property int $ItemID
 * @property string|null $ItemName
 *
 * @property Tblistreturn[] $tblistreturns
 */
class Tbitem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbitem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => 'Item ID',
            'ItemName' => 'Item Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblistreturns()
    {
        return $this->hasMany(Tblistreturn::className(), ['ItemID' => 'ItemID']);
    }
}
