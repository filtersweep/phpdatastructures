<?php

namespace org\filterswept\Sort;

class MergeSort extends Sort {

    private function merge($left, $right) {
        $result = array();
        $i = 0;
        $lIndex = 0;
        $rIndex = 0;
        $lBound = count($left);
        $rBound = count($right);

        while ($lIndex < $lBound || $rIndex < $rBound) {
            if ($lIndex < $lBound && $rIndex < $rBound) {
                if ($left[$lIndex] < $right[$rIndex]) {
                    $result[$i++] = $left[$lIndex++];

                } else {
                    $result[$i++] = $right[$rIndex++];
                }

            } else if ($lIndex < $lBound) {
                $result[$i++] = $left[$lIndex++];

            } else if ($rIndex < $rBound) {
                $result[$i++] = $right[$rIndex++];
            } 
        }

        return $result;
    }
    
    public function sortArray($a) {
        $length = count($a);

        if ($length <= 1) {
            return $a;
        }

        $pivot = round($length / 2);
        $left = $this->sortArray(array_slice($a, 0, $pivot));
        $right = $this->sortArray(array_slice($a, $pivot));

        return $this->merge($left, $right);
    }

}

?>