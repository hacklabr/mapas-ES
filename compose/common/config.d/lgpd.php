<?php 

return [
    'module.LGPD' => [
        'termsOfUsage'=>[
            'title'=> 'Termos e Condições de Uso', 
            'text'=> file_get_contents(__DIR__ . '/../lgpd-terms/terms-of-usage.html')
        ],
        'privacyPolicy' => [
            'title'=>  'Política de Privacidade',
            'text'=> file_get_contents(__DIR__ . '/../lgpd-terms/privacy-policy.html')
        ],
        'imageOfUsage' => [
            'title'=>  'Autorização de uso de imagem',
            'text'=> file_get_contents(__DIR__ . '/../lgpd-terms/images-use.html')
        ],
    ]
];