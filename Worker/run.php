<?php
require_once __DIR__ . '/../vendor/autoload.php';

$worker = new \Paunin\Worker\Instagramm(
    '370236096',
    '370236096.96711f8.595aee91a6bf48989f0066ba19d646f6',
    500,
    __DIR__ . '/../media/originals',
    __DIR__ . '/../media/numbered'
);
$worker->extract()
       ->numberise();

file_put_contents(__DIR__ . '/../js/cache/imagesCacheVersion.js', 'var IMAGES_CACHE_VERSION=' . time() . ';');
