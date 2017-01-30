#!/usr/bin/php
<?php
// OAuthスクリプトの読み込み
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

    // developer info
    $consumerKey       = '6cM9uIUuYzVtlhYe9JfRV4aIM';
    $consumerSecret    = 'eBBVABtyvBllktfYATkqPHWDPo3iDyfoE4sVq3wcb0RrXnzvKc';
    $accessToken       = '813345248239755264-LeSukBk45fJRV6uHeg0jHtIycxiO3l0';
    $accessTokenSecret = 'GVFsv2bIKzNY13tk7ik4lrugb6qUdwriLxs7PUJnpncUS';

    $oAuth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);


    // oAuth認証を利用し、twitterに投稿する
    $TWITTER_STATUS_UPDATE_URL = "http://api.twitter.com/1.1/statuses/update.json";
    $method = 'POST';
// ファイルの行をランダムに抽出
$filelist = file('growl.txt');
if( shuffle($filelist) ){
  $message = $filelist[0];
  $message = mb_substr($message, 0, -2, "SJIS");
}
if( shuffle($filelist) & rand(0,3)!=1){
  $message .= $filelist[0];
  $message = mb_substr($message, 0, -2, "SJIS");
}
if( shuffle($filelist) & rand(0,1)!=1){
  $message .= $filelist[0];
  $message = mb_substr($message, 0, -2, "SJIS");
}
if( shuffle($filelist) & rand(0,3)==1){
  $message .= $filelist[0];
  $message = mb_substr($message, 0, -2, "SJIS");
}
$str = mb_convert_encoding($message,"utf-8","sjis"); 
//$message = $message1 . $message2;
    $response = $oAuth->post('statuses/update', array('status' => $str));

    // 結果出力
    var_dump($response);

?>
