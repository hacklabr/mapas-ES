<?php

namespace SettingsES;

use DateTime;
use MapasCulturais\App;
use MapasCulturais\i;

class Controller extends \MapasCulturais\Controllers\EntityController
{
    use \MapasCulturais\Traits\ControllerAPI;

    function __construct()
    {
    }


    public function GET_liccSummary()
    {
        $app = App::i();

        $this->requireAuthentication();

        $this->render('licc-summary', []);
    }


    public function POST_generateLiccSummary()
    {
        $app = App::i();

        $this->requireAuthentication();

        $em = $app->em;
        $conn = $em->getConnection();

        $request = $this->data;

        $errors = [];
        if (!isset($request['registrations']) || empty($request['registrations']) || $request['registrations'] == "") {
            $errors[] = "Informe o número de pelomenos uma inscrição";
        }

        $request['registrations'] = trim($request['registrations']);

        $delimiter = "\n";
        if (strpos($request['registrations'], ",") !== false) {
            $delimiter = ",";
        }

        if (strpos($request['registrations'], ";") !== false) {
            $delimiter = ";";
        }

        if (!$delimiter) {
            $errors[] = "As inscrições devem estar separadas por virgula, ponto e virgula ou uma em cada linha";
        }


        if ($errors) {
            $this->render('licc-summary-erros', ['errors' => $errors]);
        } else {
            if ($numbers = explode($delimiter, $request['registrations'])) {
                $results = [];
                foreach ($numbers as $number) {
                    $number = trim($number);
                    $_number = preg_replace('/[^0-9]/i', '', $number);
                    if ($reg = $app->repo('Registration')->find($_number)) {
                        if ($reg->opportunity->canUser("@control")) {
                            if ($revisions = $conn->fetchAll("SELECT * FROM entity_revision er WHERE er.object_type = 'MapasCulturais\Entities\Registration' AND er.object_id = '{$_number}' ORDER BY er.create_timestamp ASC")) {
                                foreach ($revisions as $revision) {
                                    $results[$number]['revisions'][] = [
                                        'data' => (new DateTime($revision['create_timestamp']))->format("d/m/Y H:i:s"),
                                        'action' => $revision['message'],
                                    ];
                                }
                            }

                            if ($files = $conn->fetchAll("SELECT * FROM file f WHERE f.object_type = 'MapasCulturais\Entities\Registration' AND f.object_id = '{$_number}' ORDER BY f.create_timestamp ASC")) {
                                foreach ($files as $file) {
                                    $results[$number]['files'][] = [
                                        'data' => (new DateTime($file['create_timestamp']))->format("d/m/Y H:i:s"),
                                        'name' => $file['name'],
                                    ];
                                }
                            }
                        }
                    }
                }

                if ($results) {
                    $this->render('licc-summary-result', ['results' => $results, 'request' => $request]);
                }
            }
        }
    }
}
