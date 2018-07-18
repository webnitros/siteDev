<?php
/** @var array $input */
/** @var array $scriptProperties */
/** @var pdoFetch $pdoFetch */
if (!$modx->loadClass('pdofetch', MODX_CORE_PATH . 'components/pdotools/model/pdotools/', false, true)) {
    return false;
}
$pdoFetch = new pdoFetch($modx, $scriptProperties);
$file = $pdoFetch->config['elementsPath'].$input;
if (!file_exists($file)) {
    $modx->log(modX::LOG_LEVEL_ERROR, "[".__CLASS__."][".__LINE__."] ".__FUNCTION__.": Error not found file ".$file);
} else {
    $scriptProperties['input'] = file_get_contents($pdoFetch->config['elementsPath'].$input);
    return $modx->runSnippet('MarkDown', $scriptProperties);
}
return '';