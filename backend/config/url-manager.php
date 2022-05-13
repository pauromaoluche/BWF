<?php
use yii\web\Request;

$baseUrl = str_replace('/backend/web', '', (new Request)->getBaseUrl());
return [
    'scriptUrl' => $baseUrl . '/backend/index.php',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        ['pattern' => 'sitemap', 'route' => 'sitemap', 'suffix' => '.xml'],
        ['pattern' => '<controller>/btn-extra/<number:\d+>', 'route' => '<controller>/btn-extra', 'suffix' => '.html'],
        ['pattern' => '<controller>/c-<category_id:\d+>-<title>', 'route' => '<controller>', 'suffix' => '.html'],
        ['pattern' => '<controller>/<id:\d+>-<title>', 'route' => '<controller>/view', 'suffix' => '.html'],
        ['pattern' => '<controller>/<action>/<id:\d+>', 'route' => '<controller>/<action>', 'suffix' => '.html'],
        ['pattern' => '<controller>/<id:\d+>', 'route' => '<controller>/view', 'suffix' => '.html'],
        ['pattern' => '<controller>/<action>', 'route' => '<controller>/<action>', 'suffix' => '.html'],
        ['pattern' => '<controller>', 'route' => '<controller>', 'suffix' => '.html'],
    ],
];
