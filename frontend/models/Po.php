<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "po".
 *
 * @property int $id
 * @property string $po_no
 * @property string $note
 *
 * @property PoIteme[] $poItemes
 */
class Po extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_no', 'note'], 'required'],
            [['note'], 'string'],
            [['po_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'po_no' => 'ÑŞã ÇáãäÊÌ',
            'note' => 'ãáÇÍÙÇÊ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoItemes()
    {
        return $this->hasMany(PoIteme::className(), ['po_id' => 'id']);
    }
}
