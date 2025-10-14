<?php

return [
    'plugins' => [
        'MultipleLocalAuth',
        'AdminLoginAsUser',
        'Analytics',
        'Accessibility',
        'SpamDetector',
        'ValuersManagement',

        'SettingsES' => ['namespace' => 'SettingsES'],
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
                'enabled' => true,
                'url' => 'https://suporte.mapasculturais.com.br/assets/chat/chat-no-jquery.min.js',    
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
        // "ClaimForm"
    ]
];