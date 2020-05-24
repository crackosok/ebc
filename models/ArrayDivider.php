<?php 

namespace app\models;

class ArrayDivider 
{
    public function getSeparatorIndex(array $array, int $number) {
        $separatorIndex = -1;
        $leftCount = 0;
        $rightCount = 0;

        // Counting all N occurences
        for($i = 0; $i < count($array); $i++) {
            if($array[$i] == $number) {
                $leftCount++;
            }
        }         
        
        // Searching for the separator index if possible
        for($i = count($array) - 1; $i >= 0; $i--){
            if($array[$i] == $number) {
                $leftCount--;
            } else {
                $rightCount++;
            }
            if($leftCount === $rightCount && $leftCount !== 0){
                $separatorIndex = $i;
                break;
            }
        }
            
        return $separatorIndex;
    }
}