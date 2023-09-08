<?php
return [
    'app.offline' => date('Y-m-d H:i:s') < '2020-10-05 08:00:00',
    'app.offlineUrl' => '/em-breve',
    'app.offlineBypassFunction' => function() {
        $senha = $_GET['online'] ?? '';
        
        if ($senha === 'aldir.blanc.es') {
            $_SESSION['online'] = true;
        }

        return $_SESSION['online'] ?? false;
    }
];