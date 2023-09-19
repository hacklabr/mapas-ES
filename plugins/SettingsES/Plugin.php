<?php

namespace SettingsES;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin
{

    public function __construct(array $config = array())
    {
        $config += [];
        parent::__construct($config);
    }

    public function _init()
    {
        $app = App::i();

        // Permite que seja possível enviar as inscrições em rascunho na oportunidade 265 mesmo com período de inscrição fechado
        $app->hook('can(Registration.send)', function ($user, &$result) {
            if ($this->opportunity->id == 265 && $this->sentTimestamp) {
                $result = true;
            }
        });
    }

    public function register()
    {
    }
}
