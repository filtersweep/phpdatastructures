<?php

namespace org\filterswept\Sort;

class BubbleSort extends Sort {

    public function sortArray($a) {
        if (!$a) {
            throw new \Exception('Bad argument.');
        }

        $bound = count($a) - 1;
        $sorted = false;

        while (!$sorted) {
            $sorted = true;

            for ($i = 0; $i < $bound; ++$i) {
                if ($a[$i] >= $a[$i + 1]) {
                    $this->arraySwap($a, $i, $i + 1);
                    $sorted = false;
                }
            }
        }
        return $a;
    }
}

?>