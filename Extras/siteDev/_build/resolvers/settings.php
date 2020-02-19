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


        $default_template = null;
        if ($template = $modx->getObject('modTemplate', array('templatename' => 'Base'))) {
            $default_template = $template->get('id');
        }


        $default_template_category = null;
        if ($template = $modx->getObject('modTemplate', array('templatename' => 'Catalog'))) {
            $default_template_category = $template->get('id');
        }


        $default_template_product = null;
        if ($template = $modx->getObject('modTemplate', array('templatename' => 'Product'))) {
            $default_template_product = $template->get('id');
        }


        $error_page = null;
        if ($resource = $modx->getObject('modResource', array('alias' => 'error404'))) {
            $error_page = $resource->get('id');
        }


        $site_unavailable_page = null;
        if ($resource = $modx->getObject('modResource', array('alias' => 'error503'))) {
            $site_unavailable_page = $resource->get('id');
        }


        $unauthorized_page = null;
        if ($resource = $modx->getObject('modResource', array('alias' => 'error403'))) {
            $unauthorized_page = $resource->get('id');
        }

        $site_start = null;
        if ($resource = $modx->getObject('modResource', array('alias' => 'index'))) {
            $site_start = $resource->get('id');
        }


        $site_catalog = null;
        if ($resource = $modx->getObject('modResource', array('alias' => 'catalog'))) {
            $site_catalog = $resource->get('id');
        }



        $settings = array(
            'default_template' => $default_template,
            'error_page' => $error_page,
            'site_unavailable_page' => $site_unavailable_page,
            'site_start' => $site_start,
            'unauthorized_page' => $unauthorized_page,
            'friendly_alias_translit' => 'russian',
            'friendly_urls' => true,
            'global_duplicate_uri_check' => true,
            'allow_multiple_emails' => true,
            'friendly_alias_realtime' => true,
            'friendly_urls_strict' => true,
            'hidemenu_default' => true,
            'use_alias_path' => true,
            'resource_tree_node_name' => 'menutitle',
            'resource_tree_node_tooltip' => 'menutitle',
            'automatic_alias' => true,
            'auto_check_pkg_updates' => false,
            'feed_modx_news_enabled' => false,
            'feed_modx_security_enabled' => false,
            'link_tag_scheme' => 'full',
            'locale' => 'ru_RU.utf-8',
            'password_generated_length' => '6',
            'password_min_length' => '6',
            'publish_default' => true,
            'signupemail_message' => '<p>Здравствуйте [[+uid]],</p><p>Ваши данные для административного входа на [[+sname]]:</p>                <p><strong>Логин:</strong> [[+uid]]<br /><strong>Пароль:</strong> [[+pwd]]<br /></p>                <p>После того как вы войдете в административную часть MODX [[+surl]], вы можете изменить свой пароль.</p>                <p>С уважением, <br />Администрация сайта</p>',

            // pdoTools
            'log_deprecated' => false,
            'pdotools_fenom_default' => true,
            'pdotools_fenom_modx' => true,
            'pdotools_fenom_parser' => true,
            'pdotools_fenom_php' => true,

            'msdemodata_parent_resource' => $site_catalog,
            'ms2_template_category_default' => $default_template_category,
            'ms2_template_product_default' => $default_template_product,
            #'pdotools_elements_path' => '{core_path}components/'.$transport->name.'/elements/',
        );

        foreach ($settings as $key => $value) {
            /* @var modSystemSetting $tmp */
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => $key))) {
                $tmp = $modx->newObject('modSystemSetting');
                $tmp->set('key',$key);
            }

            $tmp->set('value', $value);
            $tmp->save();
        }

        $success = true;
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        $success = true;
        break;
}

return $success;