<?php
return [
    'app.offline' => date('Y-m-d H:i:s') > '2024-04-24 08:30:00' && date('Y-m-d H:i:s') < '2024-04-24 09:00:00',
    'app.offlineUrl' => '/em-breve',
    'app.offlineBypassFunction' => function() {
        $senha = $_GET['online'] ?? '';
        
        if ($senha === env('OFFLINE_BYPASS')) {
            $_SESSION['online'] = true;
        }

        return $_SESSION['online'] ?? false;
    }
];