<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\ArrayDivider;


class DivideArrayController extends Controller
{
    protected $arrayDivider;
    public $array, $number;

    public function __construct($id, $module, ArrayDivider $arrayDivider)
    {
        parent::__construct($id, $module);
        $this->arrayDivider = $arrayDivider;
    }

    public function options($actionID)
    {
        return ['array', 'number'];
    }

    public function actionIndex()
    {
        $array = json_decode($this->array);
        $number = (int)$this->number;
        
        echo $this->arrayDivider->getSeparatorIndex($array, $number);
    }
}
