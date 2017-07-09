<?php
require_once __DIR__ . '/Instagramm.php';

$worker = new \Paunin\Worker\Instagramm(
    '370236096',
    '370236096.96711f8.595aee91a6bf48989f0066ba19d646f6',
    500,
    '/var/www/application/media/originals',
    '/var/www/application/media/numbered'
);
$worker->extract()
       ->numberise();

file_put_contents('/var/www/application/js/cache/imagesCacheVersion.js', 'var IMAGES_CACHE_VERSION=' . time() . ';');
