var siteDev = function (config) {
    config = config || {};
    siteDev.superclass.constructor.call(this, config);
};
Ext.extend(siteDev, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}, buttons: {}
});
Ext.reg('sitedev', siteDev);

siteDev = new siteDev();