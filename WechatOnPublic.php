<?php

/**
 * @@判断是否关注了公众号
 *
 */

$access_token = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=&secret=xxxx";
$access_msg = json_decode(file_get_contents($access_token));
$token = $access_msg->access_token;
$subscribe_msg = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$token&openid=$_GET[openid]";
$subscribe = json_decode(file_get_contents($subscribe_msg));
$gzxx = $subscribe->subscribe;
if ($gzxx === 1) {
    echo "已关注";
} else {
    echo "未关注";
}