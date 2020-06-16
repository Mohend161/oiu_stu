<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "po_iteme".
 *
 * @property int $id
 * @property string $po_iteme_no
 * @property float $qte
 * @property int $po_id
 *
 * @property Po $po
 */
class PoIteme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po_iteme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_iteme_no', 'qte', 'po_id'], 'required'],
            [['qte'], 'number'],
            [['po_id'], 'integer'],
            [['po_iteme_no'], 'string', 'max' => 10],
            [['po_id'], 'exist', 'skipOnError' => true, 'targetClass' => Po::className(), 'targetAttribute' => ['po_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'po_iteme_no' => 'Po Iteme No',
            'qte' => 'Qte',
            'po_id' => 'Po ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPo()
    {
        return $this->hasOne(Po::className(), ['id' => 'po_id']);
    }
}
