<?php
namespace MapaCulturalCapixaba;


use MapasCulturais\App;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {
    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {

        parent::_init();
        
        $app = App::i();
        
         // Manifest do five icon
        $app->hook('GET(site.webmanifest)', function() use ($app) {
            /** @var \MapasCulturais\Controller $this */
            $this->json([
                'icons' => [
                    [ 'src' => $app->view->asset('img/favicon-16x16.png', false), 'type' => 'image/png', 'sizes' => '16x16' ],
                    [ 'src' => $app->view->asset('img/favicon-32x32.png', false), 'type' => 'image/png', 'sizes' => '32x32' ]
                ],
            ]);
        });
    }
}
