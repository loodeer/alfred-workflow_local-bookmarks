<?php
/**
 * Created by PhpStorm.
 * User: loodeer
 * Date: 7/12/18
 * Time: 11:09
 */
include_once 'base.php';

$db = new MysqliDb('127.0.0.1', 'root', '123456', 'test', '3306', 'utf8');
$config = $db->get('citys');

$workflow = new \Alfred\Workflows\Workflow();

foreach ($config as $key => $_config) {

    $workflow->result()
             ->uid($key)
             ->title($_config['cn_name'])
             ->subtitle($_config['en_name'])
             //->quicklookurl($_config['url'])
             ->type('default')
             ->arg($_config['created_at'])
             ->valid(true)
             ->icon('search.png');
}

echo $workflow->output();
