<?php

function pre($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    echo '<hr>';
    var_dump($array);
}

function pree($array)
{
    pre($array);
    exit();
}

function dd($array)
{
    pree($array);
}

function d($array)
{
    pre($array);
}

return [
    'adminName'          => 'woodcraft',
    'adminEmail'         => 'admin@woodcraft-ural.ru',
    'adminEmailPassword' => '6eOqXpA6',
    'siteName'           => 'woodcraft-ural.ru',
    'woodcraftEmail'     => 'woodcraft-ural@yandex.ru'
];
