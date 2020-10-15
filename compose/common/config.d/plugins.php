<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'logotipo_instituicao' => '/assets/aldirblanc/img/governo-cultura.png',
                'logotipo_central' => '/assets/aldirblanc/img/aldir-blanc.png',
                'inciso1_enabled' => env('AB_INCISO1_ENABLE',true),
                'inciso2_enabled' => env('AB_INCISO2_ENABLE',false),
                'inciso3_enabled' => env('AB_INCISO3_ENABLE',false),
                

                'project_id' => 1,
                'inciso1' => (array) json_decode(env('AB_INCISO1', '[]')),
                'inciso1_opportunity_id' => 1,
                'inciso2_opportunity_ids' => (array) json_decode(env('AB_INCISO2_OPPORTUNITY_IDS', '[]')),
                
                'texto_home'=> env('AB_TEXTO_HOME','A Lei Aldir Blanc é fruto de forte mobilização social do campo artístico e cultural brasileiro, resultado de construção coletiva, a partir de webconferências nacionais e estaduais como plataformas políticas na formulação, articulação, tramitação e sanção presidencial.<br/><br/> Ela prevê o uso de 3 bilhões de reais para o auxílio de agentes da cultura atingidos pela pandemia da COVID-19. Investimentos para assegurar a preservação de toda a estrutura profissional e dinâmica de produção, criação, participação, preservação, formação e circulação dos bens e serviços culturais.<br/><br/> Clique no link abaixo para solicitar a renda emergencial como trabalhadora e trabalhador da cultura ou o subsídio para a manutenção de espaços artísticos e organizações culturais que tiveram as suas atividades interrompidas por força das medidas de isolamento social.'),
                'botao_home'=> env('AB_BOTAO_HOME','Solicite seu auxilio'),
                'titulo_home'=> env('AB_TITULO_HOME','Lei Aldir Blanc'),
                'link_suporte' => env('AB_LINK_SUPORTE','mailto:suportemapacultural@secult.es.gov.br'),
                'privacidade_termos_condicoes' => env('AB_PRIVACIDADE_TERMOS',null),
                'prefix_project' =>  'Lei Aldir Blanc | ' ,
                'inciso2' =>
                [
                    (object) ["owner" =>1462, "city" => "João Neiva"],
                    (object) ["owner" =>1463, "city" => "Laranja da Terra"],
                    (object) ["owner" =>1464, "city" => "Linhares"],
                    (object) ["owner" =>1465, "city" => "Marataizes"],
                    (object) ["owner" =>1466, "city" => "Montanha"],
                    (object) ["owner" =>1467, "city" => "Pedro Canário"],
                    (object) ["owner" =>1468, "city" => "Piuma"],
                    (object) ["owner" =>1469, "city" => "Ponto Belo"],
                    (object) ["owner" =>1470, "city" => "Rio Bananal"],
                    (object) ["owner" =>1471, "city" => "Rio Novo do Sul"],
                    (object) ["owner" =>1472, "city" => "Santa Leopoldina"],
                    (object) ["owner" =>1474, "city" => "Santa Maria de Jetibá"],
                    (object) ["owner" =>1475, "city" => "Santa Teresa"],
                    (object) ["owner" =>1480, "city" => "São Domingos do Norte"],
                    (object) ["owner" =>1481, "city" => "São Gabriel da Palha"],
                    (object) ["owner" =>1482, "city" => "São Mateus"],
                    (object) ["owner" =>1483, "city" => "Serra"],
                    (object) ["owner" =>1484, "city" => "Venda Nova do Imigrante"],
                    (object) ["owner" =>1485, "city" => "Viana"],
                    (object) ["owner" =>1431, "city" => "Vitória"],
                    (object) ["owner" =>1445, "city" => "Afonso Cláudio"],
                    (object) ["owner" =>1488, "city" => "Água Doce do Norte"],
                    (object) ["owner" =>1489, "city" => "Anchieta"],
                    (object) ["owner" =>1490, "city" => "Apiacá"],
                    (object) ["owner" =>1492, "city" => "Aracruz"],
                    (object) ["owner" =>1493, "city" => "Atílio Vivacqua"],
                    (object) ["owner" =>1494, "city" => "Boa Esperança"],
                    (object) ["owner" =>1495, "city" => "Bom Jesus do Norte"],
                    (object) ["owner" =>1430, "city" => "Colatina"],
                    (object) ["owner" =>1496, "city" => "Domingos Martins"],
                    (object) ["owner" =>1497, "city" => "Dores do Rio Preto"],
                    (object) ["owner" =>1498, "city" => "Fundão"],
                    (object) ["owner" =>1499, "city" => "Guaçui"],
                    (object) ["owner" =>1500, "city" => "Guarapari"],
                    (object) ["owner" =>1501, "city" => "Ibiraçu"],
                    (object) ["owner" =>1502, "city" => "Ibitirama"],
                    (object) ["owner" =>1503, "city" => "Iconha"],
                    (object) ["owner" =>1505, "city" => "Itaguaçu"],
                    (object) ["owner" =>1506, "city" => "Itarana"],
                    (object) ["owner" =>1507, "city" => "Jaguaré"],
                ],
            ],
        ],
        'AldirBlancRedirects' => [
            'namespace' => 'AldirBlancRedirects',
            'config' => [
                'condition' => function() {
                    $app = MapasCulturais\App::i();

                    if($app->user->is('guest')){
                        return false;
                    }

                    $plugin = $app->plugins['AldirBlanc'];

                    // só pode acessar as demais urls quem tiver controle sobre o agente da SECULT
                    $opportunities_ids = array_values($plugin->config['inciso2_opportunity_ids']);
                    $opportunities_ids[] = $plugin->config['inciso1_opportunity_id'];

                    $opportunities = $app->repo('Opportunity')->findBy(['id' => $opportunities_ids]);
                    
                    $evaluation_method_configurations = [];

                    foreach($opportunities as $opportunity) {
                        $evaluation_method_configurations[] = $opportunity->evaluationMethodConfiguration;
                        
                        if($opportunity->canUser('@control') || $opportunity->canUser('viewEvaluations') || $opportunity->canUser('evaluateRegistrations')) {
                            return true;
                        }
                    }

                    foreach ($evaluation_method_configurations as $emc) {
                        $param = [
                            'originType' => 'MapasCulturais\Entities\EvaluationMethodConfiguration',
                            'originId' => $emc->id, 
                            'destinationType' => 'MapasCulturais\Entities\Agent',
                            'destinationId' => $app->user->profile->id,
                        ];

                        if($request = $app->repo('RequestAgentRelation')->findOneBy($param)) {
                            return true;
                        }
                    }
                    return false;
                }
            ]
        ],

    ]
];
