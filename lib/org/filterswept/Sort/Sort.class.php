<?php

namespace org\filterswept\Sort;

abstract class Sort {

    protected function arraySwap(&$a, $i, $j) {
        $temp = $a[$i];
        $a[$i] = $a[$j];
        $a[$j] = $temp;
    }

    abstract public function sortArray($a);
}

?>