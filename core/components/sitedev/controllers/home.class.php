<?php

/**
 * The home manager controller for siteDev.
 *
 */
class siteDevHomeManagerController extends modExtraManagerController
{
    /** @var siteDev $siteDev */
    public $siteDev;


    /**
     *
     */
    public function initialize()
    {
        $this->siteDev = $this->modx->getService('siteDev', 'siteDev', MODX_CORE_PATH . 'components/sitedev/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['sitedev:default'];
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
        return $this->modx->lexicon('sitedev');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->siteDev->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/sitedev.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/widgets/packages.grid.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/widgets/packages.windows.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->siteDev->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        siteDev.config = ' . json_encode($this->siteDev->config) . ';
        siteDev.config.connector_url = "' . $this->siteDev->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "sitedev-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="sitedev-panel-home-div"></div>';

        return '';
    }
}