<?php

/**
 * The home manager controller for modExtra.
 *
 */
class modExtraHomeManagerController extends modExtraManagerController
{
    /** @var modExtra $modExtra */
    public $modExtra;


    /**
     *
     */
    public function initialize()
    {
        $this->modExtra = $this->modx->getService('modExtra', 'modExtra', MODX_CORE_PATH . 'components/modextra/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['modextra:manager', 'modextra:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modextra');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modExtra->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/modextra.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/default.grid.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/default.window.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items/grid.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items/windows.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addJavascript(MODX_MANAGER_URL . 'assets/modext/util/datetime.js');

        $this->modExtra->config['date_format'] = $this->modx->getOption('modextra_date_format', null, '%d.%m.%y <span class="gray">%H:%M</span>');
        $this->modExtra->config['help_buttons'] = ($buttons = $this->getButtons()) ? $buttons : '';

        $this->addHtml('<script type="text/javascript">
        modExtra.config = ' . json_encode($this->modExtra->config) . ';
        modExtra.config.connector_url = "' . $this->modExtra->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "modextra-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .=  '<div id="modextra-panel-home-div"></div>';
        return '';
    }

    /**
     * @return string
     */
    public function getButtons()
    {
        $buttons = null;
        $name = 'modExtra';
        $path = "Extras/{$name}/_build/build.php";
        if (file_exists(MODX_BASE_PATH . $path)) {
            $site_url = $this->modx->getOption('site_url').$path;
            $buttons[] = [
                'url' => $site_url,
                'text' => $this->modx->lexicon('modextra_button_install'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1&encryption_disabled=1',
                'text' => $this->modx->lexicon('modextra_button_download'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1',
                'text' => $this->modx->lexicon('modextra_button_download_encryption'),
            ];
        }
        return $buttons;
    }
}