<?php

return [
    'plugins' => [
        'MultipleLocalAuth',
        'AdminLoginAsUser',
        'Analytics',
        'Accessibility',

        'SettingsES' => ['namespace' => 'SettingsES'],
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
                'enabled' => true,
                'url' => 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js',
                'background' => '#F66968'
            ]
            ],
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },
            ]
        ],
    ]
];