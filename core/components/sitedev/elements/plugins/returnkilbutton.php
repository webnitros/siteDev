<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 10.01.2019
 * Time: 12:36
 */
switch ($modx->event->name) {
    case 'OnManagerPageBeforeRender':
        if ($modx->hasPermission('purge_deleted')) {
            $modx->controller->addHtml('<script>Ext.onReady(function() {
                var tree = Ext.getCmp("modx-resource-tree");
                tree.emptyRecycleBin = function() {
                    MODx.msg.confirm({
                        title: _("empty_recycle_bin")
                        ,text: _("empty_recycle_bin_confirm")
                        ,url: MODx.config.connector_url
                        ,params: {
                            action: "resource/emptyRecycleBin"
                        }
                        ,listeners: {
                            "success":{fn:function() {
                                Ext.select("div.deleted",this.getRootNode()).remove();
                                MODx.msg.status({
                                    title: _("success")
                                    ,message: _("empty_recycle_bin_emptied")
                                });
                                var trashButton = this.getTopToolbar().findById("emptifier");
                                trashButton.disable();
                                trashButton.setTooltip(_("empty_recycle_bin") + " (0)");
                                this.fireEvent("emptyTrash");
                            },scope:this}
                        }
                    });
                }
                tree.deleteDocument = function(itm,e) {
                        var node = this.cm.activeNode;
                        var id = node.id.split("_");id = id[1];
                        var pagetitle = node.ui.textNode.innerText;
                        MODx.msg.confirm({
                            title: pagetitle ? _("resource_delete") + " " + pagetitle : _("resource_delete")
                            ,text: _("resource_delete_confirm")
                            ,url: MODx.config.connector_url
                            ,params: {
                                action: "resource/delete"
                                ,id: id
                            }
                            ,listeners: {
                                "success": {fn:function(data) {
                                    var trashButton = this.getTopToolbar().findById("emptifier");
                                    if (trashButton) {
                                        if (data.object.deletedCount == 0) {
                                            trashButton.disable();
                                        } else {
                                            trashButton.enable();
                                        }
                    
                                        trashButton.setTooltip(_("empty_recycle_bin") + " (" + data.object.deletedCount + ")");
                                    }
                    
                                    var n = this.cm.activeNode;
                                    var ui = n.getUI();
                    
                                    ui.addClass("deleted");
                                    n.cascade(function(nd) {
                                        nd.getUI().addClass("deleted");
                                    },this);
                                    Ext.get(ui.getEl()).frame();
                                },scope:this}
                            }
                        });
                    }
            });</script>');
        }
        break;
    case 'OnResourceToolbarLoad': // ПРИОРИТЕТ 1000
        if ($modx->hasPermission('purge_deleted')) {

            /* @var array $items */
            if (count($items) > 0) {
                foreach ($items as $k => $item) {
                    if (isset($item['cls']) and $item['cls'] == 'tree-trash') {
                        unset($items[$k]);
                        break;
                    }
                }

                $deletedResources = $modx->getCount('modResource', array('deleted' => 1));
                $items[] = array(
                    'id' => 'emptifier',
                    'cls' => 'tree-trash',
                    'tooltip' => $modx->lexicon('empty_recycle_bin') . " ({$deletedResources})",
                    'disabled' => ($deletedResources == 0) ? true : false,
                    'handler' => 'this.emptyRecycleBin',
                );
                exit($modx->toJSON($modx->error->success('', array_values($items))));
            }
        }
        break;
}