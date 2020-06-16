<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "tbreview".
 *
 * @property int $ID
 * @property int|null $LonID
 * @property int|null $TyItID
 * @property float|null $Money
 */
class Tbreview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbreview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LonID', 'TyItID'], 'integer'],
            [['Money'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'LonID' => 'Lon ID',
            'TyItID' => 'Ty It ID',
            'Money' => 'Money',
        ];
    }
}
