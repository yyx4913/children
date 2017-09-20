<?php
function type($type) {
    if($type == 1) {
        $str = '完成';
    }elseif($type == 0) {
        $str = "未完成";
    }
    return $str;
}
