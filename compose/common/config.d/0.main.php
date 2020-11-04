<?php 
use MapasCulturais\i;

if (env('REDIS_CACHE', false)) {
    $redis = new \Redis();
    $redis->connect('redis');
    $cache = new \Doctrine\Common\Cache\RedisCache;
    $cache->setRedis($redis);
    
    $redis = new \Redis();
    $redis->connect('redis');
    $mscache = new \Doctrine\Common\Cache\RedisCache;
    $mscache->setRedis($redis);
} else {
    $cache = new \Doctrine\Common\Cache\ApcuCache;
    $mscache = new \Doctrine\Common\Cache\ApcuCache;
}

return [
    'app.cache' => $cache,
    'app.mscache' => $mscache,
    'app.siteName' => env('SITE_NAME', 'Mapa Cultural ES'),
    'app.siteDescription' => env('SITE_DESCRIPTION', 'Solução para os cadastros da Lei Aldir Blanc'),

    'themes.active' => env('ACTIVE_THEME', 'MapasCulturais\Themes\BaseV1'),

    'app.lcode' => env('APP_LCODE', 'pt_BR'),

    // colocar sigla do estado, ou código do ibge?
    'registration.prefix' => env('REGISTRATION_PREFIX', 'on-'),

    'namespaces' => array(
        'MapasCulturais\Themes' => THEMES_PATH,
        'MapasCulturais\Themes\BaseV1' => THEMES_PATH . 'BaseV1/',
        'Subsite' => THEMES_PATH . 'Subsite/',
    ),

    'doctrine.database' => [
        'host'           => env('DB_HOST', 'db'),
        'dbname'         => env('DB_NAME', 'mapas'),
        'user'           => env('DB_USER', 'mapas'),
        'password'       => env('DB_PASS', 'mapas'),
        'server_version' => env('DB_VERSION', 11),
    ]
];