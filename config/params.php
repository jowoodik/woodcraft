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
    'adminEmail'         => 'yuferev1993@yandex.ru',
    'adminEmailPassword' => 'YyB9Y9yEL',
    'siteName'           => 'woodcraft-ural.ru',
];
