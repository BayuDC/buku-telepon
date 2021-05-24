<?php

use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

function emptyValue($str) {
    return $str == '' ? null : $str;
}
function emptyText($str) {
    return $str == null ? 'Belum diatur' : $str;
}
function removeSpace($str) {
    return preg_replace('/\s+/', '', $str);
}
function getAlert($message, $error = false) {
    return [
        'message' => $message,
        'error' => $error
    ];
}
function validator($data, $rule) {
    return Config\Services::validation()->run($data, $rule);
}
function clear($data) {
    return array_map(function ($item) {
        return esc($item);
    }, $data);
}
function deleteImg($file) {
    try {
        unlink('img/' . $file);
        return true;
    } catch (Exception) {
        return false;
    }
}
