<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ArrayDivider;
use app\models\DivideResult;
use yii\filters\auth\HttpBearerAuth;

class DivideController extends Controller 
{
    protected $arrayDivider;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = HttpBearerAuth::className();
        return $behaviors;
    }

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
        $divideResultModel->user_id = Yii::$app->user->getId();
        $divideResultModel->result = $result;
        $divideResultModel->save();
        
        return [
            'index' => $result
        ];
    }
}