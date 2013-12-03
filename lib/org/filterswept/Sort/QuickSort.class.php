<?php

namespace org\filterswept\Sort;

class QuickSort extends Sort {

    public function sortArray($a) {
        $length = count($a);

        if ($length <= 1) {
            return $a;
        }

        $pivot = round($length / 2);
        $less = array();
        $lessOff = 0;
        $more = array();
        $moreOff = 0;

        for ($i = 0; $i < $pivot; ++$i) {
            if ($a[$i] < $a[$pivot]) {
                $less[$lessOff++] = $a[$i];
            } else { 
                $more[$moreOff++] = $a[$i];
            }
        }

        for ($i = $pivot + 1; $i < $length; ++$i) {
            if ($a[$i] < $a[$pivot]) {
                $less[$lessOff++] = $a[$i];
            } else { 
                $more[$moreOff++] = $a[$i];
            }
        }

        $less = $this->sortArray($less);
        $less[] = $a[$pivot];
        $more = $this->sortArray($more);

        return array_merge($less, $more);
    }
}

?>