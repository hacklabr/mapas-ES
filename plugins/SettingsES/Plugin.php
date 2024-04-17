<?php

namespace SettingsES;

use MapasCulturais\App;
use SettingsES\Controller;

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

        $this->reopenEvaluations();
    }

    public function register()
    {
        $app = App::i();
        $app->registerController('essettings', Controller::class);
    }

    /**
     * Função para reabrir as avaliações nos editais que tiveram impacto dos metadados duplicados
     */
    public function reopenEvaluations()
    {
        $app = App::i();

        $registrations = [
            '13048' => [1787793248, 2060560646, 1246987641, 164822607]

        ];

        $app->hook("can(RegistrationEvaluation.modify)", function($user, &$can) use ($registrations){
            $regs = $registrations["$user->id"] ?? [];
            if(in_array($this->registration->id, $regs)){
                $can = true;
            }
        });

        $app->hook("can(Registration.evaluate)", function($user, &$can) use ($registrations){
            $regs = $registrations["$user->id"] ?? [];
            if(in_array($this->id, $regs)){
                $can = true;
            }
        });
    }
}