<?php


namespace common\models;


use common\components\ParserNewNumbers;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CadastralSearchForm extends Model
{
    /**
     * @var string $cadastralNumbers
     */
    public $cadastralNumbers;
    /**
     * @var array $cadastralNumbersArray
     */
    public $cadastralNumbersArray;
    /**
     * @var array $not_isset_cadastral_numbers
     */
    protected $not_isset_cadastral_numbers;
    /**
     * @var array $errors
     */
    public $errors = [];

    public function rules()
    {
        return [
            [['cadastralNumbers'], 'required'],
            [['cadastralNumbers'], 'string'],

        ];
    }

    public function parse()
    {
        $this->setNumbers()->check()->createNewCadastralNumbers();
    }

    /**
     * @return array
     */
    public function getNotIssetCadastralNumbers(): array
    {
        return $this->not_isset_cadastral_numbers ? $this->not_isset_cadastral_numbers : [];
    }

    /**
     * @return $this
     */
    protected function setNumbers()
    {
        $cadasrtalNumbersArray = explode( ',', $this->cadastralNumbers );
        foreach ($cadasrtalNumbersArray as $index => $number) {
            $this->cadastralNumbersArray[$index] = trim( $number );
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function check()
    {
        foreach ($this->cadastralNumbersArray as $index => $number) {
            if (!self::isIsset( $number )) {
                $this->not_isset_cadastral_numbers[] = $number;
            }
        }
        return $this;
    }

    protected function createNewCadastralNumbers()
    {
        $result = ParserNewNumbers::getInformationAboutNumbers( $this )->saveInformationAboutNumbers();
        if ($errors = $result->getErrors()) {
            $this->errors = $errors;
        }
    }


    /**
     * @param string $cadastralNumber
     * @return bool
     */
    private function isIsset(string $cadastralNumber): bool
    {
        return CadastralNumber::find()->where( ['cadastralNumber' => $cadastralNumber] )->exists();
    }

    /**
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = CadastralNumber::find();

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );
        if ($this->cadastralNumbersArray) {
            foreach ($this->cadastralNumbersArray as $index => $number) {
                $query->orFilterWhere( ['like', 'cadastralNumber', trim( $number )] );
            }
        }
        return $dataProvider;
    }
}