siteDev.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'sitedev-panel-home',
            renderTo: 'sitedev-panel-home-div'
        }]
    });
    siteDev.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(siteDev.page.Home, MODx.Component);
Ext.reg('sitedev-page-home', siteDev.page.Home);