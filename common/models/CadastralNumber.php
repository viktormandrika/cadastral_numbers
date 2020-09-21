<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cadastral_number".
 *
 * @property int $id
 * @property string $cadastralNumber Кадастровый номер
 * @property string $address Адрес
 * @property float $price Цена
 * @property float $area Площадь
 */
class CadastralNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cadastral_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cadastralNumber', 'address', 'price', 'area'], 'required'],
            [['price', 'area'], 'number'],
            [['cadastralNumber', 'address'], 'string', 'max' => 255],
            [['cadastralNumber'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cadastralNumber' => 'Cadastral Number',
            'address' => 'Address',
            'price' => 'Price',
            'area' => 'Area',
        ];
    }
}
