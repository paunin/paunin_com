<?php
require_once __DIR__ . '/Instagramm.php';

$worker = new \Paunin\Worker\Instagramm(
    '370236096',
    '370236096.96711f8.9bd54f06b2934e3d9ba2c1a38161f7ef',
    500,
    '/var/www/paunin/data/www/paunin.com/media/originals',
    '/var/www/paunin/data/www/paunin.com/media/numbered'
);
$worker->extract()
       ->numberise();

file_put_contents('/var/www/paunin/data/www/paunin.com/js/cache/imagesCacheVersion.js', 'var IMAGES_CACHE_VERSION=' . time() . ';');
