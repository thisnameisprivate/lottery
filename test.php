<?php


declare(strict_types = 1);

function returnInterVal (int $value): int
{
    return $value;
}

print(returnInterVal(5));

function arrayRecursive (&$array, $function, $apply_to_keys_also = false) {
    static $recursive_counter = 0;
    if (++ $recursive_counter > 1000) {
        die('possible deep recursion attack.');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }
        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter --;
}

function useRedis () {
    $tableName = $_COOKIE['tableName'];
    if (! isset($tableName)) return false;
    // 判断数据库中是否有该表
    $isTable = M()->query("show tables like '{$tableName}'");
    if (! $isTable) {
        if (! $this->createTable($tableName)) {
            return false;
        }
    }
    if ($redis->exists($tableName . "_arrivalTotal")) {
        $keyNames = $redis->keys($tableName  . "*");
        $statusSuffixConf = $this->statusSuffixConf();
        for ($i = 0; $i < count($keyNames); $i ++) {
            $str = $redis->get($keyNames[$i]);
            if (! substr($str, 0, 1) == '{') {
                $strIden = explode('_', $keyNames[$i]);
                $this->assign($strIden[1], $str);
            } else {
                $strIden = explode('_', $keyNames[$i]);
                $this->assign($strIden[1], json_decode($str, true));
            }
            $redis->expire($keyNames[$i], $statusSuffixConf['endTime']);
        }
    } else {
        while (list ($k, $v) = each ($collection)) $this->arrivalSetRedis($tableName . "_" . $k, $v);
    }
}