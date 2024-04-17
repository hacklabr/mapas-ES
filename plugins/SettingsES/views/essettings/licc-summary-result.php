<?php

/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-card
 ');

$url = $app->createUrl("essettings", "liccSummary");
?>

<mc-card>
    <form method="POST" action="<?= $url ?>">
        <div class="field col-12">
            <?php foreach ($results as $registration => $result) : ?>
                <h2><?= i::_e("Inscrição {$registration}") ?></h2>
                <?php if (isset($request['useRevision'])) : ?>
                    <h3><?= i::_e("Histórico de alterações") ?></h3>
                    <table style="border: 1px solid black">
                        <thead>
                            <tr>
                                <td style="border: 1px solid black"><?= i::_e("Inscrição") ?></td>
                                <td style="border: 1px solid black"><?= i::_e("Data da alteração") ?></td>
                                <td style="border: 1px solid black"><?= i::_e("Ação executada") ?></td>
                            </tr>
                        </thead>
                        <?php foreach ($result['revisions'] as $key => $revision) : ?>
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid black"><?= $registration ?></td>
                                    <td style="border: 1px solid black"><?= $revision['data'] ?></td>
                                    <td style="border: 1px solid black"><?= $revision['action'] ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                <?php endif ?>
                <h3><?= i::_e("Lista de arquivos") ?></h3>
                <table style="border: 1px solid black">
                    <thead>
                        <tr>
                            <td style="border: 1px solid black"><?= i::_e("Inscrição") ?></td>
                            <td style="border: 1px solid black"><?= i::_e("Data de carregamento do arquivo") ?></td>
                            <td style="border: 1px solid black"><?= i::_e("Nome do arquivo") ?></td>
                        </tr>
                    </thead>
                    <?php foreach ($result['files'] as $key => $file) : ?>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid black"><?= $registration ?></td>
                                <td style="border: 1px solid black"><?= $file['data'] ?></td>
                                <td style="border: 1px solid black"><?= $file['name'] ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>


            <?php endforeach ?>
        </div>

        <div class="col-3">
            <a href="<?=$url?>"  class="button button--md publish publish-exit">
                <?php i::_e("Voltar") ?>
            </a>
        </div>
    </form>
</mc-card>