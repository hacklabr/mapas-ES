<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        'MapasNetwork' => ['namespace' => 'MapasNetwork'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'logotipo_instituicao' => '/assets/aldirblanc/img/governo-cultura.png',
                'logotipo_central' => '/assets/aldirblanc/img/aldir-blanc.png',
                'inciso1_enabled' => false,
                'msg_inciso1_disabled' => 'Inscrições encerradas!',
                'inciso2_enabled' => env('AB_INCISO2_ENABLE',true),
                'msg_inciso2_disabled' => 'Inscrições encerradas!',

                'inciso3_enabled' => true,
                'mediados_owner' => 1,
                'project_id' => 1,
                'inciso1' => (array) json_decode(env('AB_INCISO1', '[]')),
                'inciso1_opportunity_id' => 1,
                'inciso2_opportunity_ids' => (array) json_decode(env('AB_INCISO2_OPPORTUNITY_IDS', '[]')),
                
                'texto_home'=> env('AB_TEXTO_HOME',null),
                'botao_home'=> env('AB_BOTAO_HOME',null),
                'titulo_home'=> env('AB_TITULO_HOME',null),
                'link_suporte' => env('AB_LINK_SUPORTE','mailto:suportemapacultural@secult.es.gov.br'),
                'privacidade_termos_condicoes' => env('AB_PRIVACIDADE_TERMOS',null),
                'inciso2_default' => [
                    "seal"=>1,
                    "shortDescription"=>"Benefício para auxiliar espaços e organizações culturais a manter suas atividades durante o isolamento social ocasionado pela pandemia covid-19 - orientada pela Lei Aldir Blanc (Lei nº 14.017)."
                ],
                'exporta_desbancarizados' => [
                    "mci460" => "MCI460",
                    "addressReport" => "Relação de endereços",
                ],
                'lista_mediadores' => [
                    'mediador1@hacklab.com.br'=> [1],
                    'mediador3cidade@hacklab.com.br' => [41,40,38],
                    'mediador1cidade@hacklab.com.br' => [42],
                    'mediatudo@hacklab.com.br' => [],
                    'veronica.rhaacke@gmail.com' => []
                ],
                'mediadores_prolongar_tempo' => env('AB_MEDIADORES_PROLONGAR_TEMPO', true),

                'zammad_enable' => env('AB_ZAMMAD_ENABLE', true),
                'zammad_src_form' => env('AB_ZAMMAD_SRC_FORM', 'https://suporte.es.mapasculturais.com.br/assets/form/form.js'),
                'zammad_src_chat' => env('AB_ZAMMAD_SRC_CHAT', 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js'),
                'zammad_background_color' => env('AB_ZAMMAD_SRC_CHAT', '#6080FF'),
                // define os ids para dataprev e avaliadores genericos
                'avaliadores_dataprev_user_id' => (array) json_decode(env('AB_AVALIADORES_DATAPREV_USER_ID', '["5", "1894", "1895"]')),
                'avaliadores_genericos_user_id' => (array) json_decode(env('AB_AVALIADORES_GENERICOS_USER_ID', '["2924"]')),
                
                // define a exibição do resultado das avaliações para cada status (1, 2, 3, 8, 10)
                'exibir_resultado_padrao' => (array) json_decode(env('AB_EXIBIR_RESULTADO_PADRAO', '["1", "2", "3", "10"]')),
                'exibir_resultado_dataprev' => (array) json_decode(env('AB_EXIBIR_RESULTADO_DATAPREV', '["2"]')),
                'exibir_resultado_generico' => (array) json_decode(env('AB_EXIBIR_RESULTADO_GENERICO', '[]')),
                'exibir_resultado_avaliadores' => (array) json_decode(env('AB_EXIBIR_RESULTADO_AVALIADORES', '["3", "10"]')),
                'email_recurso' => env('AB_EMAIL_RECURSO', 'recurso@secult.es.gov.br'),
                'msg_recurso' => env('AB_MENSAGEM_RECURSO', 'Conforme previsto pelo edital que trata a respeito deste benefício, poderá o interessado cadastrado interpor recurso administrativo do resultado. O recurso deverá ser apresentado exclusivamente por e-mail (recurso@secult.es.gov.br), e deverá conter, minimamente: a. Identificação completa do interessado/recorrente; b. Documentos comprobatórios, quando cabíveis; c. Identificação do item controverso/recorrido; d. Razões que fundamentem o recurso; e. Os pedidos do recurso.'),

                // mensagens de status padrao
                'msg_status_sent' => env('AB_STATUS_SENT_MESSAGE', 'Consulte novamente em outro momento.'), // STATUS_SENT = 1
                'msg_status_invalid' => env('AB_STATUS_INVALID_MESSAGE', 'Sua solicitação foi analisada e homologada pela equipe da Secult ES, mas invalidada pelo Dataprev.'), // STATUS_INVALID = 2
                'msg_status_approved' => env('AB_STATUS_APPROVED_MESSAGE', 'Seu cadastro foi analisado, homologado e validado pelo sistema Dataprev. Aguardando o pagamento do benefício.'), // STATUS_APPROVED = 10
                'msg_status_notapproved' => env('AB_STATUS_NOTAPPROVED_MESSAGE', 'Seu cadastro foi analisado, mas não foi homologado.'), // STATUS_NOTAPPROVED = 3
                'msg_status_waitlist' => env('AB_STATUS_WAITLIST_MESSAGE', 'Os recursos disponibilizados já foram destinados. Para sua solicitação ser aprovada será necessário aguardar possível liberação de recursos. Consulte novamente em outro momento.'), //STATUS_WAITLIST = 8

                // mensagem para reprocessamento do Dataprev, para ignorar a mensagem retornada pelo Dataprev e exibir a mensagem abaixo
                'msg_reprocessamento_dataprev' => env('AB_MENSAGEM_REPROCESSAMENTO_DATAPREV', 'O status de sua solicitação foi alterado de Selecionada para Inválida. Isso aconteceu por erro do DataPrev, sistema disponibilizado pelo governo federal para a averiguação de que as pessoas solicitantes do auxílio emergencial cumprem os critérios previstos na Lei Federal de número 14.017/2020, regulamentados pelo Decreto Estadual de número 4741-R.<br><br> 
Por este novo processamento, o sistema acusa que seu CPF é "Titular de benefício previdenciário ou assistencial ou beneficiários do seguro desemprego ou contemplados com benefício emergencial'),

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
                    (object) ["owner" =>2480, "city" => "Iúna"],
                    (object) ["owner" =>2485, "city" => "Conceição da Barra"],
                    (object) ["owner" =>2486, "city" => "Jerônimo Monteiro"],
                    (object) ["owner" =>2532, "city" => "Divino São Lourenço"],
                    (object) ["owner" =>2529, "city" => "Baixo Guandu"],
                    (object) ["owner" =>2479, "city" => "Brejetuba"],
                    (object) ["owner" =>4227, "city" => "Mimoso do Sul"],
                    (object) ["owner" =>4228, "city" => "Vila Valério "],
                ],
            ],
        ],
        'AldirBlancDataprev' => [
            'namespace' => 'AldirBlancDataprev',
            'config' => [
                'consolidacao_requer_validacoes' => ['financeiro']
            ],
        ],

        'SECULT' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                // slug utilizado como id do controller e identificador do validador
                'slug' => 'secult',

                // nome apresentado na interface
                'name' => 'SECULT',

                'forcar_resultado' => true,

                'consolidacao_requer_homologacao' => false,

                // indica que só deve exportar as inscrições já homologadas
                'exportador_requer_homologacao' => true,

                // indica que a exportação não requer nenhuma validação
                'exportador_requer_validacao' => [],

                // indica que só deve consolidar o resultado se a inscrição
                // já tiver sido processada pelo Dataprev
                'consolidacao_requer_validacoes' => [],

                'inciso1' => [],
            ]
        ],

        'SECULT_financeiro' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                // slug utilizado como id do controller e identificador do validador
                'slug' => 'secult_financeiro',

                // nome apresentado na interface
                'name' => 'SECULT - Financeiro',

                'forcar_resultado' => true,

                'consolidacao_requer_homologacao' => false,

                // indica que só deve exportar as inscrições já homologadas
                'exportador_requer_homologacao' => true,

                // indica que a exportação não requer nenhuma validação
                'exportador_requer_validacao' => [],

                // indica que só deve consolidar o resultado se a inscrição
                // já tiver sido processada pelo Dataprev
                'consolidacao_requer_validacoes' => [],

                'inciso1' => [],
            ]
        ],

        'PreDataprev' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                // slug utilizado como id do controller e identificador do validador
                'slug' => 'pre_dataprev',

                // nome apresentado na interface
                'name' => 'Pré-processamento Dataprev',

                'forcar_resultado' => true,

                'consolidacao_requer_homologacao' => false,

                // invalidada a exportação pq não faz sentido
                'exportador_requer_validacao' => ['nao-exportar'],

                'consolidacao_requer_validacoes' => [],

                'inciso1' => [],
            ]
        ],


        'RegistrationPayments' => [ 'namespace' => 'RegistrationPayments' ],
                
        'Recursos' => ['namespace' => 'AldirBlancValidadorRecurso'],
        
        'Financeiro' => [
            'namespace' => 'AldirBlancValidadorFinanceiro',
            'config' => [
                'exportador_requer_validacao' => ['dataprev'],
                'consolidacao_requer_homologacao' => false,
                'consolidacao_requer_validacoes' => []
            ],
        ]
    ]
];
