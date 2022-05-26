<?php

// 冒泡排序
function bubble_sort(&$arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        for ($j = 0; $j < count($arr) - 1 - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
            }
        }
    }
}

echo "bubble_sort\n";
$nums = [-1, 5, 3, 1, 50, 12];
bubble_sort($nums);
print_r($nums);

// 冒泡排序改进1
function bubble_sort_1(&$arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        $exchange = false;
        for ($j = $len - 1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
                $exchange = true;
            }
        }
        if ($exchange === false) {
            return;
        }
    }
}

echo "bubble_sort_1\n";
$nums1 = [-1, 5, 3, 1, 50, 12];
bubble_sort_1($nums1);
print_r($nums1);


// 冒泡排序改进2
function bubble_sort_2(&$arr)
{
    $len = count($arr);
    $exchange = true;
    while ($exchange) {
        $exchange = false;
        for ($i = 0; $i < $len - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $tmp;
                $exchange = true;
            }
        }
    }
}

echo "bubble_sort_2\n";
$nums2 = [-1, 5, 10, 3, 1, 50, 12];
bubble_sort_2($nums2);
print_r($nums2);

//========================================//

// 快速排序
function quick_sort(array $arr): array
{
    if (count($arr) <= 1) {
        return $arr;
    }
    $left = $right = [];
    $mid = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $mid) {
            $right[] = $arr[$i];
        } else {
            $left[] = $arr[$i];
        }
    }
    $left = quick_sort($left);
    $right = quick_sort($right);
    return array_merge($left, [$mid], $right);
}

echo "quick_sort\n";
$nums = [-1, 5, 10, 3, 1, 50, 12];
print_r(quick_sort($nums));

// 快速排序
function quick_sort_1(array &$arr, int $start, int $end)
{
    if ($start >= $end) {
        return;
    }
    $left = $start;
    $right = $end;
    $mid = $arr[$left];
    while ($left < $right) {
        while ($arr[$right] >= $mid && $left < $right) {
            $right--;
        }
        $arr[$left] = $arr[$right];

        while ($arr[$left] <= $mid && $left < $right) {
            $left++;
        }
        $arr[$right] = $arr[$left];
    }
    $arr[$left] = $mid;
    quick_sort_1($arr, $start, $left - 1);
    quick_sort_1($arr, $left + 1, $end);
}

echo "quick_sort_1\n";
$nums_q1 = [-1, 5, 10, 3, 1, 50, 12];
quick_sort_1($nums_q1, 0, count($nums_q1) - 1);
print_r($nums_q1);