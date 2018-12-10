<?php
/**
 * Created by PhpStorm.
 * User: loodeer
 * Date: 10/12/18
 * Time: 19:56
 */

include_once 'base.php';

$db = new MysqliDb('127.0.0.1', 'root', '123456', 'alfred', '3306', 'utf8');

$query = '标题,search,http://beibei.com';

list($title, $search_word, $url) = explode(',', $query);
$id = wukong_add($db, $title, $search_word, $url);

echo $db->getLastError();

function wukong_add($db, $title, $search_word, $url) {
    $data_time = date('Y-m-d H:i:s', time());
    return $db->insert('bookmarks', [
        'domain' => 'wukong',
        'title' => $title,
        'search_word' => $search_word,
        'url' => $url,
        'gmt_create' => $data_time,
        'gmt_modified' => $data_time,
    ]);
}

die;