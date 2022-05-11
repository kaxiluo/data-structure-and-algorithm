<?php

// 二分查找
function binary_search($nums, $target)
{
    $low = 0;
    $high = count($nums) - 1;
    if ($nums[0] > $target || $nums[$high] < $target) {
        return -1;
    }
    while ($low <= $high) {
        $mid = ceil(($high - $low) / 2) + $low;
        if ($nums[$mid] > $target) {
            $high = $mid - 1;
        } elseif ($nums[$mid] < $target) {
            $low = $mid + 1;
        } else {
            return $mid;
        }
    }
    return -1;
}

$nums = [-1, 0, 3, 5, 9, 12];
$out = binary_search($nums, 9);
assert($out == 4);
$out = binary_search($nums, 2);
assert($out == -1);