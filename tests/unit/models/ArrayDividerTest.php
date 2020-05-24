<?php

namespace tests\unit\models;

use app\models\ArrayDivider;

class ArrayDividerTest extends \Codeception\Test\Unit 
{
    protected $model;

    public function testWorkingArrayExample() {
        $this->model = new ArrayDivider;
        $testArray = [5, 5, 1, 7, 2, 3, 5];
        $testNumber = 5;
        $separatorIndex = $this->model->getSeparatorIndex($testArray, $testNumber);
        expect($separatorIndex, 4);
    }

    public function testNotWorkingArrayExample() {
        $this->model = new ArrayDivider;
        $testArray = [1, 2, 3];
        $testNumber = 3;
        $separatorIndex = $this->model->getSeparatorIndex($testArray, $testNumber);
        expect($separatorIndex, -1);
    }

    public function testNoNumberArrayExample() {
        $this->model = new ArrayDivider;
        $testArray = [1, 2, 3, 4, 5];
        $testNumber = 6;
        $separatorIndex = $this->model->getSeparatorIndex($testArray, $testNumber);
        expect($separatorIndex, -1);
    }

    public function testSameNumbersArrayExample() {
        $this->model = new ArrayDivider;
        $testArray = [0, 0, 0, 0, 0, 0];
        $testNumber = 0;
        $separatorIndex = $this->model->getSeparatorIndex($testArray, $testNumber);
        expect($separatorIndex, -1);
    }
}