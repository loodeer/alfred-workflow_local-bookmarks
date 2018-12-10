<?php
/**
 * Created by PhpStorm.
 * User: loodeer
 * Date: 10/12/18
 * Time: 19:34
 */
include_once 'base.php';

$db = new MysqliDb('127.0.0.1', 'root', '123456', 'alfred', '3306', 'utf8');

$query = 'test';

switch ($query) {
    case 'all':
        break;
    case 'wukong':
    case 'doc':
    case 'marvin':
    case 'ops':
        $db->where('domain', $query);
        break;
    default:
        $db->where('search_word', '%' . $query . '%', 'like');
        $db->orWhere('url', '%' . $query . '%', 'like');
        $db->orWhere('title', '%' . $query . '%', 'like');
}



$config = $db->get('bookmarks');

$icon_map = ['wukong' => 'wukong.png', 'marvin' => 'paolu.png', 'doc' => 'search.png', 'ops' => 'icon.png'];

$workflow = new \Alfred\Workflows\Workflow();

foreach ($config as $key => $_config) {
    $icon = $icon_map[$_config['domain']];
    $workflow->result()
             ->uid($_config['id'])
             ->title($_config['title'] . '----' . $_config['search_word'])
             ->subtitle($_config['url'] . '----' . $_config['gmt_create'])
             ->quicklookurl($_config['url'])
             ->type('default')
             ->arg($_config['url'])
             ->valid(true)
             ->icon($icon);
}

echo $workflow->output();
