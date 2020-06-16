<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbuser".
 *
 * @property int $UserID
 * @property string|null $FullUserName
 * @property string|null $UserName
 * @property string|null $Passwrd
 * @property int|null $TypeUser
 */
class Tbuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TypeUser'], 'integer'],
            [['FullUserName', 'UserName', 'Passwrd'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'FullUserName' => 'Full User Name',
            'UserName' => 'User Name',
            'Passwrd' => 'Passwrd',
            'TypeUser' => 'Type User',
        ];
    }
}
