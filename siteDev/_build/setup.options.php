<?php

$module = '';
$output = null;


/** @var array $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        $out .= '<h3>modExtra</h3>';
        $out .= '<b>1) Переименовать компонент modExtra</b> <input type="checkbox" checked class="x-form-text x-form-field x-tab-strip-active" name="rename_modextra" value="1" onchange="var componentRenam = Ext.get(\'mod_extra_rename_component\'); if(Ext.get(this).hasClass(\'x-tab-strip-active\')) { Ext.get(this).removeClass(\'x-tab-strip-active\'); componentRenam.setStyle(\'display\', \'none\'); } else { Ext.get(this).addClass(\'x-tab-strip-active\'); componentRenam.setStyle(\'display\', \'block\');}; "> <br> после установки siteDev, modExtra будет перименован<br><br>';
        $out .= '<div id="mod_extra_rename_component"><b>Новое имя компонента</b> <input type="text" checked class="x-form-text x-form-field" name="rename_modextra_name" value=""> <br><small>укажите новое имя компонента на литинице. Можно использовать только буквы и только на латинице с верхним и нижним регистром</small><br></div><br>';
        #$out .= '<b>2) Установить компонент</b> <input type="checkbox" checked class="x-form-text x-form-field" name="install_modextra" value="1"> <br> после уставноки siteDev компонент modExtra будет установлен<br><br>';
        break;
}

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


    $out .= '<h3>Компоненты</h3>';
    $out .= 'Выберите компоненты, которые необходимо <b>добавить</b>:<br/>
        <small>
            <a href="#" onclick="Ext.get(\'formCheckboxesPackage\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
            <a href="#" onclick="Ext.get(\'formCheckboxesPackage\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
        </small>
    ';

        $out .= '
	<div id="setup_form_wrapper">
        <div id="modx-mysettings-beforeinstall" class="x-tab-panel vertical-tabs-panel wrapped x-tab-panel-noborder" style="width: auto;">
            <ul id="formCheckboxesPackage" class="formCheckedInpit" style="height:220px;overflow:auto;">' . $package_install . '</ul>
        </div>
	</div>
	';



    break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}


return $out;