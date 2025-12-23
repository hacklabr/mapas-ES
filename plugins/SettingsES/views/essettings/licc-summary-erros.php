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
    <div class="field col-12">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>

    <div class="col-3">
        <a href="<?= $url ?>" type="submit" class="button button--md publish publish-exit">
            <?php i::_e("Voltar") ?>
        </a>
    </div>
</mc-card>