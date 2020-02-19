siteDev.window.CreatePackage = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'sitedev-package-window-create';
    }
    Ext.applyIf(config, {
        title: _('sitedev_package_create'),
        width: 550,
        autoHeight: true,
        url: siteDev.config.connector_url,
        action: 'mgr/package/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    siteDev.window.CreatePackage.superclass.constructor.call(this, config);
};
Ext.extend(siteDev.window.CreatePackage, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('sitedev_package_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('sitedev_package_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('sitedev_package_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('sitedev-package-window-create', siteDev.window.CreatePackage);


siteDev.window.UpdatePackage = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'sitedev-package-window-update';
    }
    Ext.applyIf(config, {
        title: _('sitedev_package_update'),
        width: 550,
        autoHeight: true,
        url: siteDev.config.connector_url,
        action: 'mgr/package/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    siteDev.window.UpdatePackage.superclass.constructor.call(this, config);
};
Ext.extend(siteDev.window.UpdatePackage, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('sitedev_package_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('sitedev_package_description'),
            name: 'description',
            id: config.id + '-description',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('sitedev_package_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('sitedev-package-window-update', siteDev.window.UpdatePackage);