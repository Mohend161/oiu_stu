<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbcollege".
 *
 * @property int $CollegeID
 * @property string|null $CollegeName
 *
 * @property Tblon[] $tblons
 */
class Tbcollege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbcollege';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CollegeName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CollegeID' => 'رقم الكلية',
            'CollegeName' => 'إسم الكلية',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblons()
    {
        return $this->hasMany(Tblon::className(), ['CollegeID' => 'CollegeID']);
    }
}
