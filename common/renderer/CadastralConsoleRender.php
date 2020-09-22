<?php


namespace common\renderer;


use common\models\CadastralNumber;
use yii\console\widgets\Table;
use yii\data\ActiveDataProvider;

/**
 * Class CadastralConsoleRender
 *
 * @package common\renderer
 * @property CadastralNumber[] $models
 * @property array             $cadastralNumbers
 */
class CadastralConsoleRender
{
    /**
     * @var CadastralNumber[] $models
     */
    public $models;
    /**
     * @var array $cadastralNumbers
     */
    public $cadastralNumbers = [];

    public static function render(ActiveDataProvider $dataProvider)
    {
        $render = new self();
        $render->models = $dataProvider->query->all();
        $render->generateArray()->drawTable();
    }

    public function generateArray()
    {
        foreach ($this->models as $model) {
            $this->cadastralNumbers[] = [
                $model->cadastralNumber,
                $model->address,
                $model->price,
                $model->area,
            ];
        }
        return $this;
    }

    public function drawTable()
    {
        echo Table::widget(
            [
                'headers' => ['CN', 'Addr', 'Price', 'Area'],
                'rows' => $this->cadastralNumbers,
            ]
        );
    }
}