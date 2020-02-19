<?php
/** @var modX $modx */
/* @var array $scriptProperties */
switch ($modx->event->name) {
    case 'OnHandleRequest':
        /* @var modExtra $modExtra*/
        $modExtra = $modx->getService('modextra', 'modExtra', $modx->getOption('modextra_core_path', $scriptProperties, $modx->getOption('core_path') . 'components/modextra/') . 'model/');
        if ($modExtra instanceof modExtra) {
            $modExtra->loadHandlerEvent($modx->event, $scriptProperties);
        }
        break;
}
return '';