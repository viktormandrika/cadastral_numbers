<?php


namespace common\models;


use common\components\ParserNewNumbers;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CadastralSearchForm extends Model
{

    public $cadastralNumbers;
    public $array;
    public $not_isset_cadastral_numbers;

    public function rules()
    {
        return [
            [['cadastralNumbers'], 'required'],
            [['cadastralNumbers'], 'string'],

        ];
    }

    public function setNumbers()
    {
        $explode = explode( ',', $this->cadastralNumbers );
        foreach ($explode as $index => $ex) {
            $this->array[$index] = $ex;
        }
    }

    public function check()
    {
        foreach ($this->array as $index => $item) {
            if (!self::isIsset( $item )) {
                $this->not_isset_cadastral_numbers[] = $item;
            }
        }
    }

    public function createNewCadastralNumbers()
    {
        ParserNewNumbers::createNewNumbers( $this );
    }

    private function isIsset(string $cadastralNumber): bool
    {
        return CadastralNumber::find()->where( ['cadastralNumber' => $cadastralNumber] )->exists();
    }

    public function search()
    {
        $query = CadastralNumber::find();

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        foreach ($this->array as $index => $item) {
            $query->orFilterWhere( ['like', 'cadastralNumber', trim( $item )] );
        }
        return $dataProvider;
    }
}