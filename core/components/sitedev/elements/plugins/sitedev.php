<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/* @var siteDev $siteDev */
switch ($modx->event->name) {
    case 'OnMODXInit':
        if ($siteDev = $modx->getService('sitedev', 'siteDev', MODX_CORE_PATH . 'components/sitedev/model/')) {
            $siteDev->initialize();
        }
        break;
    default:
        if ($siteDev = $modx->getService('siteDev')) {
            $siteDev->handleEvent($modx->event, $scriptProperties);
        }
}