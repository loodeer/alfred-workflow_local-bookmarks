<?php
/**
 * Created by PhpStorm.
 * User: loodeer
 * Date: 7/12/18
 * Time: 10:57
 */
include_once 'base.php';

$query = "{query}";
$config = [
    ['title' => 'jiaoyi 交易细节熟悉', 'url' => 'http://doc.husor.com/pages/viewpage.action?pageId=99929412'],
];


$workflow = new \Alfred\Workflows\Workflow();

foreach ($config as $key => $_config) {

    if ($query != 'all' && FALSE === strpos($_config['title'], $query)) {
        continue;
    }

    $workflow->result()
             ->uid($key)
             ->title($_config['title'])
             ->subtitle($_config['url'])
             ->quicklookurl($_config['url'])
             ->type('default')
             ->arg($_config['url'])
             ->valid(true)
             ->icon('search.png');
}

echo $workflow->output();