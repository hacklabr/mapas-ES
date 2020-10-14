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

                'inciso1_enabled' => true,
                'inciso2_enabled' => false,
                'inciso3_enabled' => false,

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
                    (object) ["owner" => 1, "city" => "Conceição do Araguaia"],
                    (object) ["owner" => 1, "city" => "Igarapé-Miri"],
                    (object) ["owner" => 1, "city" => "Abel Figueired"],
                    (object) ["owner" => 1, "city" => "Acará"],
                    (object) ["owner" => 1, "city" => "Augusto Correa"],
                    (object) ["owner" => 1, "city" => "Bragança"],
                    (object) ["owner" => 1, "city" => "Breu Branco"],
                    (object) ["owner" => 1, "city" => "Capitação Poço"],
                    (object) ["owner" => 1, "city" => "Castanhal"],
                    (object) ["owner" => 1, "city" => "Ananindeua"],
                    (object) ["owner" => 1, "city" => "Bagre"],
                    (object) ["owner" => 1, "city" => "Baião"],
                    (object) ["owner" => 1, "city" => "Barcarena"],
                    (object) ["owner" => 1, "city" => "Capanema"],
                    (object) ["owner" => 1, "city" => "Colares"],
                    (object) ["owner" => 1, "city" => "Curuçá"],
                    (object) ["owner" => 1, "city" => "Medicilândia"],
                    (object) ["owner" => 1, "city" => "Melgaço"],
                    (object) ["owner" => 1, "city" => "Nova Ipixuna"],
                    (object) ["owner" => 1, "city" => "Ourém"],
                    (object) ["owner" => 1, "city" => "Pacajá"],
                    (object) ["owner" => 1, "city" => "Paragominas"],
                    (object) ["owner" => 1, "city" => "Placas"],
                    (object) ["owner" => 1, "city" => "Sapucaia"],
                    (object) ["owner" => 1, "city" => "Viseu"],
                    (object) ["owner" => 1, "city" => "Garrafão do Norte"],
                    (object) ["owner" => 1, "city" => "Igarapé-Açu"],
                    (object) ["owner" => 1, "city" => "Jacareacanga"],
                    (object) ["owner" => 1, "city" => "Juruti"],
                    (object) ["owner" => 1, "city" => "Limoeiro do Ajuru"],
                    (object) ["owner" => 1, "city" => "Mãe do Rio"],
                    (object) ["owner" => 1, "city" => "Magalhães Barata"],
                    (object) ["owner" => 1, "city" => "Marabá"],
                    (object) ["owner" => 1, "city" => "Mojuí dos Campos"],
                    (object) ["owner" => 1, "city" => "Monte Alegre"],
                    (object) ["owner" => 1, "city" => "Muaná"],
                    (object) ["owner" => 1, "city" => "Nova Esperança do Piriá"],
                    (object) ["owner" => 1, "city" => "Palestina do Pará"],
                    (object) ["owner" => 1, "city" => "Pau D\'Arco"],
                    (object) ["owner" => 1, "city" => "Peixe-Boi"],
                    (object) ["owner" => 1, "city" => "Piçarra"],
                    (object) ["owner" => 1, "city" => "Ponta de Pedras"],
                    (object) ["owner" => 1, "city" => "Porto de Moz"],
                    (object) ["owner" => 1, "city" => "Rio Maria"],
                    (object) ["owner" => 1, "city" => "Santarém"],
                    (object) ["owner" => 1, "city" => "São Domingos do Araguaia Pará"],
                    (object) ["owner" => 1, "city" => "São Domingos do Capim"],
                    (object) ["owner" => 1, "city" => "São Felix do Xingu"],
                    (object) ["owner" => 1, "city" => "São Francisco do Pará"],
                    (object) ["owner" => 1, "city" => "São Miguel do Guamá"],
                    (object) ["owner" => 1, "city" => "São Sebastião da Boa Vista"],
                    (object) ["owner" => 1, "city" => "Terra Alta"],
                    (object) ["owner" => 1, "city" => "Tomé-Açu"],
                    (object) ["owner" => 1, "city" => "Tracuateua"],
                    (object) ["owner" => 1, "city" => "Trairão"],
                    (object) ["owner" => 1, "city" => "Ulianópolis"],
                    (object) ["owner" => 1, "city" => "Floresta do Araguaia"],
                    (object) ["owner" => 1, "city" => "Tucumã"],
                    (object) ["owner" => 1, "city" => "Xinguara "],
                    (object) ["owner" => 1, "city" => "Curuá"],
                    (object) ["owner" => 1, "city" => "Óbidos"],
                    (object) ["owner" => 1, "city" => "São João do Araguaia"],
                    (object) ["owner" => 1, "city" => "Marapanim"],
                    (object) ["owner" => 1, "city" => "São Caetano de Odivelas"],
                    (object) ["owner" => 1, "city" => "Vigia"],
                    (object) ["owner" => 1, "city" => "Cachoeira do Arari"],
                    (object) ["owner" => 1, "city" => "Curralinho"],
                    (object) ["owner" => 1, "city" => "Gurupá"],
                    (object) ["owner" => 1, "city" => "Portel"],
                    (object) ["owner" => 1, "city" => "Santa Cruz do Arari"],
                    (object) ["owner" => 1, "city" => "Nova Timboteua"],
                    (object) ["owner" => 1, "city" => "Santa Luzia do Pará"],
                    (object) ["owner" => 1, "city" => "Concordia do Pará"],
                    (object) ["owner" => 1, "city" => "Ipixuna do Pará"],
                    (object) ["owner" => 1, "city" => "Irituia"],
                    (object) ["owner" => 1, "city" => "Rondon do Pará"],
                    (object) ["owner" => 1, "city" => "Aveiro"],
                    (object) ["owner" => 1, "city" => "Novo Progresso"],
                    (object) ["owner" => 1, "city" => "Moju "],
                    (object) ["owner" => 1, "city" => "Alenquer"],
                    (object) ["owner" => 1, "city" => "Belterra"],
                    (object) ["owner" => 1, "city" => "Faro"],
                    (object) ["owner" => 1, "city" => "Primavera"],
                    (object) ["owner" => 1, "city" => "Quatipuru"],
                    (object) ["owner" => 1, "city" => "Rurópolis"],
                    (object) ["owner" => 1, "city" => "Vitória do Xingu"],
                    (object) ["owner" => 1, "city" => "Alenquer"],
                    (object) ["owner" => 1, "city" => "Canaã do Carajás"],
                    (object) ["owner" => 1, "city" => "Breves"],
                    (object) ["owner" => 1, "city" => "Cametá"],
                    (object) ["owner" => 1, "city" => "Tailândia"],
                    (object) ["owner" => 1, "city" => "Redenção"],
                    (object) ["owner" => 1, "city" => "Município de Ourilândia do Norte"],
                    (object) ["owner" => 1, "city" => "Dom Eliseu"],
                    (object) ["owner" => 1, "city" => "Município Bom Jesus do Tocantins"],
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
