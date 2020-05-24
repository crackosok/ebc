<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\ArrayDivider;
use app\models\DivideResult;


class DivideArrayController extends Controller
{
    protected $arrayDivider;
    public $array, $number, $userid;

    public function __construct($id, $module, ArrayDivider $arrayDivider)
    {
        parent::__construct($id, $module);
        $this->arrayDivider = $arrayDivider;
    }

    public function options($actionID)
    {
        return ['array', 'number', 'userid'];
    }

    public function actionIndex()
    {
        $array = json_decode($this->array);
        $number = (int)$this->number;
        $userId = (int)$this->userid;
        $result = $this->arrayDivider->getSeparatorIndex($array, $number);
        $divideResultModel = new DivideResult();
        if ($userId) {
            $divideResultModel->user_id = $userId;
        }
        $divideResultModel->result = $result;
        $divideResultModel->save();
        echo $result;
    }
}
