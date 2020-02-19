<?php

$module = '';
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $exists = $modx->getObject('transport.modTransportPackage', array('package_name' => 'pdoTools'));

        /* packages */
        $packages = [
            'Ace' => true,
            'MinifyX' => true,
            'miniShop2' => true,
            'translit' => true,
            'msDemoData' => false,
            'ClientConfig' => false,
            'modDevTools' => false,
            'hideSource' => true,
            'controlErrorLog' => true,
            'Console' => true,
        ];

        /* package install*/
        $package_install = '';
        foreach ($packages as $package => $row) {
            $package_install .= '
                        <li>
                            <label for="package_' . $package . '">
                                <input type="checkbox" id="package_' . $package . '" name="install_packages[' . $package . ']" value="' . $package . '" checked> <b>' . $package . '</b>
                            </label>
                        </li>';
        }

        $out = '
	<div id="setup_form_wrapper">
        <div id="modx-mysettings-beforeinstall" class="x-tab-panel vertical-tabs-panel wrapped x-tab-panel-noborder" style="width: auto;">
            <ul id="formCheckboxesPackage" class="formCheckedInpit" style="height:250px;overflow:auto;">' . $package_install . '</ul>
        </div>
	</div>
	';

    break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}


/** @var array $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        #$out .= '<b>Копировать папку modExtra</b> <input type="checkbox" checked class="x-form-text x-form-field" name="copy_modextra" value=""> <br> Установить галочку если требуется разработка приложения. <br>';
        break;
}

return $out;