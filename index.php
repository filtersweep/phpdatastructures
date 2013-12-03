<?php
ob_start();
require_once("lib/head.php");
header("Content-type: text/plain");

use org\filterswept\DataStructures as DS;
use org\filterswept\Sort as Sort;

/* everyone's favorite */    
function fizzBuzz($start, $end, $triggers) {
    for ($i = $start; $i <= $end; ++$i) {
        $line = '';

        foreach ($triggers as $key => $value) {
            if ($i % $key == 0) {
                $line .= $value;
            }
        }
        if ($line == "") {
            $line .= $i;
        }
        
        echo "{$line}\n";
    }
}

fizzBuzz(1, 100, Array(3 => 'Fizz', 5 => 'Buzz'));


/* simple data structures */
$foo = new DS\LinkList();
$foo->addFront("a");
$foo->addFront("b");
$foo->addFront("c");
$foo->addTail("d");

$foo = new DS\BinaryTree();
$foo->add(7);
$foo->add(1);
$foo->add(5);
$foo->add(12);
$foo->add(3);
$foo->add(2);


/* simple integer sort */
$bar = array(5, 2, 12, 6, 9, 134, 1, 23);

$foo = new Sort\BubbleSort();
echo 'Before Bubble: ', "\n";
print_r($bar);
echo 'After Bubble: ', "\n";
print_r($foo->sortArray($bar));

$foo = new Sort\MergeSort();
echo 'Before MergeSort: ', "\n";
print_r($bar);
echo 'After MergeSort: ', "\n";
print_r($foo->sortArray($bar));

$foo = new Sort\QuickSort();
echo 'Before QuickSort: ', "\n";
print_r($bar);
echo 'After QuickSort: ', "\n";
print_r($foo->sortArray($bar));

ob_end_flush();
?>