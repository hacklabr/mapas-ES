<?php
namespace EspiritoSanto;

use MapasCulturais\App;

// class Theme extends \Subsite\Theme {
class Theme extends \MapasCulturais\Themes\BaseV1\Theme {

    protected static function _getTexts()
    {
        return array(

            'site: name' => 'Mapa Cultural do Espírito Santo',
            'site: in the region' => 'no Estado do Espírito Santo',
            'site: of the region' => 'do Estado do Espírito Santo',
            'site: owner' => 'Secretaria da Cultura do Estado do Espírito Santo',
            'site: by the site owner' => 'pela Secult ES',
            'site: description' => 'O Mapa Cultural ES é uma plataforma livre e colaborativa de mapeamento da produção cultural capixaba. O sistema é alimentado pela comunidade cultural, que pode se cadastrar como agente (individual ou coletivo) quanto pela SECULT, secretarias municipais e outras instituições públicas e privadas que inserem na plataforma informações sobre equipamentos culturais, programações, editais, projetos e outras atividades.
Além de alimentar o banco de dados da cultura capixaba, o mapa também é a base do cadastro dos beneficiários da Lei Aldir Blanc no Espírito Santo.',

            'home: welcome' => "O Mapa Cultural ES é uma plataforma livre e colaborativa de mapeamento da produção cultural capixaba.",
            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural da região. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: opportunities' => "Faça a sua inscrição ou acesse o resultado de diversas convocatórias como editais, oficinas, prêmios e concursos. Você também pode criar o seu próprio formulário e divulgar uma oportunidade para outros agentes culturais.",
            'home: colabore' => "Colabore com o Mapas Culturais",

            'home: abbreviation' => "Secult ES",
            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapa Cultural. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapa Cultural é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

            'search: verified results' => 'Resultados da Secult ES',
            'search: verified' => "Secult ES"
        );
    }
 
    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
    }

    protected function _publishAssets() {

        // $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);

        // $this->enqueueScript('app', 'hide-fields', 'js/hide-fields.js');
    }

}