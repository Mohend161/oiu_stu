<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $path
 * @property string $type
 * @property int $size
 * @property string $name
 * @property int $sort_order
 *
 * @property OptionValue[] $optionValues
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'type', 'size', 'name', 'sort_order'], 'required'],
            [['size', 'sort_order'], 'integer'],
            [['path'], 'string', 'max' => 1024],
            [['type', 'name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['image_id' => 'id']);
    }
}
