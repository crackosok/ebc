<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\ArrayDivider;
use app\models\DivideResult;

class DivideController extends Controller 
{
    protected $arrayDivider;

    public function __construct($id, $module, ArrayDivider $arrayDivider)
    {
        parent::__construct($id, $module);
        $this->enableCsrfValidation = false;
        $this->arrayDivider = $arrayDivider;
    }

    public function actionIndex() 
    {
        $request = Yii::$app->request;
        $array = $request->post('array');
        $number = $request->post('number'); 
        $result = $this->arrayDivider->getSeparatorIndex($array, $number);
        $divideResultModel = new DivideResult();
        $divideResultModel->result = $result;
        $divideResultModel->save();
        return $result;
    }
}