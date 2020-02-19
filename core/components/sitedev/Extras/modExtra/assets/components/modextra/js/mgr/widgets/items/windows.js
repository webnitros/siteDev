modExtra.window.CreateItem = function (config) {
    config = config || {}
    config.url = modExtra.config.connector_url

    Ext.applyIf(config, {
        title: _('modextra_item_create'),
        width: 600,
        cls: 'modextra_windows',
        baseParams: {
            action: 'mgr/item/create',
            resource_id: config.resource_id
        }
    })
    modExtra.window.CreateItem.superclass.constructor.call(this, config)

    this.on('success', function (data) {
        if (data.a.result.object) {
            // Авто запуск при создании новой подписик
            if (data.a.result.object.mode) {
                if (data.a.result.object.mode === 'new') {
                    var grid = Ext.getCmp('modextra-grid-items')
                    grid.updateItem(grid, '', {data: data.a.result.object})
                }
            }
        }
    }, this)
}
Ext.extend(modExtra.window.CreateItem, modExtra.window.Default, {

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id', id: config.id + '-id'},
            {
                xtype: 'textfield',
                fieldLabel: _('modextra_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: false,
            }, {
                xtype: 'textarea',
                fieldLabel: _('modextra_item_description'),
                name: 'description',
                id: config.id + '-description',
                height: 150,
                anchor: '99%'
            },  {
                xtype: 'modextra-combo-filter-resource',
                fieldLabel: _('modextra_item_resource_id'),
                name: 'resource_id',
                id: config.id + '-resource_id',
                height: 150,
                anchor: '99%'
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('modextra_item_active'),
                name: 'active',
                id: config.id + '-active',
                checked: true,
            }
        ]


    }
})
Ext.reg('modextra-item-window-create', modExtra.window.CreateItem)

modExtra.window.UpdateItem = function (config) {
    config = config || {}

    Ext.applyIf(config, {
        title: _('modextra_item_update'),
        baseParams: {
            action: 'mgr/item/update',
            resource_id: config.resource_id
        },
    })
    modExtra.window.UpdateItem.superclass.constructor.call(this, config)
}
Ext.extend(modExtra.window.UpdateItem, modExtra.window.CreateItem)
Ext.reg('modextra-item-window-update', modExtra.window.UpdateItem)