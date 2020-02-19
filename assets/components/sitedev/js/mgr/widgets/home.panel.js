siteDev.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'sitedev-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('sitedev') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('sitedev_packages'),
                layout: 'anchor',
                items: [{
                    html: _('sitedev_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'sitedev-grid-packages',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    siteDev.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(siteDev.panel.Home, MODx.Panel);
Ext.reg('sitedev-panel-home', siteDev.panel.Home);
