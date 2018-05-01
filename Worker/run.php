<?php
require_once __DIR__ . '/Instagramm.php';

$worker = new \Paunin\Worker\Instagramm(
    '370236096',
    '370236096.96711f8.9bd54f06b2934e3d9ba2c1a38161f7ef',
    500,
    '/var/www/application/media/originals',
    '/var/www/application/media/numbered'
);
$worker->extract()
       ->numberise();

file_put_contents('/var/www/application/js/cache/imagesCacheVersion.js', 'var IMAGES_CACHE_VERSION=' . time() . ';');
