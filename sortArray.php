<?php
function sortArray(){
    $a = array(4, 6 , 7);
    $b = array(3, 4);
    $mergeArray = array_merge($a,$b);
    sort($mergeArray);
    print_r($mergeArray);
}
sortArray();
?>