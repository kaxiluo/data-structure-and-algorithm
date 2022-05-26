<?php

// 简单选择排序
function selection_sort(array &$arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        if ($min !== $i) {
            //1、交换律
            //2、结合律 (a^b)^c == a^(b^c)
            //3、对于任何数x，都有 x^x=0，x^0=x
            //4、自反性: a^b^b=a^0=a;
            //a = a^b
            //b=b^(a^b) = (b^b)^a = a
            //a=(a^b)^a = (a^a)^b = b
            $arr[$i] ^= $arr[$min];
            $arr[$min] ^= $arr[$i];
            $arr[$i] ^= $arr[$min];
        }
    }
}

echo "selection_sort\n";
$nums = [-1, 5, 10, 3, 1, 50, 12];
selection_sort($nums);
print_r($nums);


// 堆排序


