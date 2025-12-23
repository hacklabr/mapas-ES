<?php
$process_assets = env('ASSETS_PROCESS');

return [
    'themes.assetManager' => new \MapasCulturais\AssetManagers\FileSystem([
        'publishPath' => BASE_PATH . 'assets/',

        'mergeScripts' => $process_assets,
        'mergeStyles' => $process_assets,

        'process.js' => !$process_assets ?
                'cp {IN} {OUT}':
                'terser {IN} --source-map --output {OUT} ',

        'process.css' => !$process_assets ?
                'cp {IN} {OUT}':
                'uglifycss {IN} > {OUT}',

        'publishFolderCommand' => 'cp -R {IN} {PUBLISH_PATH}{FILENAME}'
    ]),
];