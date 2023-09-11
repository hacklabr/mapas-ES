<?php

return [
    'plugins' => [
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
                'enabled' => true,
                'url' => 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js',
                'background' => '#F66968'
            ]
        ]
    ]
];