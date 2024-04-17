<?php

/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-card
 ');

$url = $app->createUrl("essettings", "generateLiccSummary");
?>

<mc-card>
    <form method="POST" action="<?=$url?>">
        <div class="field col-12">
            <label><?php i::_e("Inscrições") ?></label>
            <textarea name="registrations" cols="30" rows="10" placeholder="<?php i::_e("Informe o número das inscrições separadas por ponto e virgula, virgula ou uma em cada linha") ?>"></textarea>
        </div>

        <div class="col-3">
            <label>
                <input type="checkbox" name="useRevision">
                <?php i::_e("Exibir historico de alterações") ?>
            </label>
            <button type="submit" class="button button--md publish publish-exit">
                <?php i::_e("Solicitar dados") ?>
            </button>
        </div>
    </form>
</mc-card>