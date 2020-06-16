<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbtypelan".
 *
 * @property int $TypeID
 * @property string|null $TypeName
 *
 * @property Tblon[] $tblons
 */
class Tbtypelan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbtypelan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TypeName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TypeID' => 'Type ID',
            'TypeName' => 'Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblons()
    {
        return $this->hasMany(Tblon::className(), ['TypeID' => 'TypeID']);
    }
}
