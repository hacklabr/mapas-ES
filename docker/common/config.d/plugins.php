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
                'url' => 'https://suporte.mapasculturais.com.br/assets/form/form.js',    
                'background' => '#F66968',
                'title' => 'Duvidas? Fale conosco',
                'chatId' => 2,
                'instacacao' => 'mapa.cultura.es.gov.br',
                'estado' => 'Espiríto Santo'
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