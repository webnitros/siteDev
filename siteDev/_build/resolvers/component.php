<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if (!$transport->xpdo || !($transport instanceof xPDOTransport)) {
    return false;
}

$modx =& $transport->xpdo;

$success = false;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $modx->log(modX::LOG_LEVEL_INFO, '');
        $modx->log(modX::LOG_LEVEL_INFO, "Package <b>modExtra</b>");

        $componentName = 'modExtra';
        if (array_key_exists('rename_modextra', $options)) {
            // Переименование пакета
            $rename_modextra = $options['rename_modextra'];
            if (!empty($rename_modextra)) {
                $componentName = $options['rename_modextra_name'];

                $modx->log(modX::LOG_LEVEL_INFO, "Rename <b>modExtra</b> on the <b>{$componentName}</b> . Please wait...");
                $_REQUEST['name'] = $componentName;
                include MODX_BASE_PATH . 'Extras/modExtra/rename_it.php';
            }
        }

        #if (array_key_exists('install_modextra', $options) and !empty($options['install_modextra'])) {
            $site_url = $modx->getOption('site_url');
            $url = "{$site_url}Extras/{$componentName}/_build/build.php";

            $modx->log(modX::LOG_LEVEL_WARN, "Install or package <a target='_blank' href='{$url}'>Install package <b>{$componentName}</b></a>. ");
            $modx->log(modX::LOG_LEVEL_WARN, $url);
            $modx->log(modX::LOG_LEVEL_INFO, '');
            $modx->log(modX::LOG_LEVEL_INFO, '');

        #}

        $success = true;
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        $success = true;
        break;
}

return $success;