<?php
$app = MapasCulturais\App::i();
$em = $app->em;
$conn = $em->getConnection();

return [
    'DB Update para criação de revisão Oportunidade 159' => function () use ($app, $em, $conn) {
        $dql = "SELECT re.id FROM MapasCulturais\\Entities\\RegistrationEvaluation re WHERE re.registration in (select r.id from  MapasCulturais\\Entities\\Registration r WHERE r.opportunity = 159) ";
        $query = $app->em->createQuery($dql);
        $ids = $query->getResult();

        foreach($ids as $id){
            $evaluation = $app->repo("RegistrationEvaluation")->find($id['id']);
            if(!$evaluation->getRevisions()){
                $evaluation->_newCreatedRevision();
            }
        }
    },
    'DB Update para criação de revisão Oportunidade 156' => function () use ($app, $em, $conn) {
        $dql = "SELECT re.id FROM MapasCulturais\\Entities\\RegistrationEvaluation re WHERE re.registration in (select r.id from  MapasCulturais\\Entities\\Registration r WHERE r.opportunity = 156) ";
        $query = $app->em->createQuery($dql);
        $ids = $query->getResult();

        foreach($ids as $id){
            $evaluation = $app->repo("RegistrationEvaluation")->find($id['id']);
            if(!$evaluation->getRevisions()){
                $evaluation->_newCreatedRevision();
            }
        }
    },
    'DB Update para criação de revisão Oportunidade 239' => function () use ($app, $em, $conn) {
        $dql = "SELECT re.id FROM MapasCulturais\\Entities\\RegistrationEvaluation re WHERE re.registration in (select r.id from  MapasCulturais\\Entities\\Registration r WHERE r.opportunity = 239) ";
        $query = $app->em->createQuery($dql);
        $ids = $query->getResult();

        foreach($ids as $id){
            $evaluation = $app->repo("RegistrationEvaluation")->find($id['id']);
            if(!$evaluation->getRevisions()){
                $evaluation->_newCreatedRevision();
            }
        }
    },
    'DB Update para criação de revisão das inscrições da oportunidade 479' => function () use ($app, $em, $conn) {
        $dql = "select r.id from  MapasCulturais\\Entities\\Registration r WHERE r.opportunity = 479";
        $query = $app->em->createQuery($dql);
        $ids = $query->getResult();
        foreach($ids as $id){
            $reg = $app->repo("Registration")->find($id['id']);
            if(!$reg->getRevisions()){
                $reg->_newCreatedRevision();
                $app->log->debug("Revision da inscrição {$reg->id} Criada");
            }
            $app->em->clear();
        }
    },
];
