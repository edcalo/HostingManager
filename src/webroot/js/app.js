Ext.Loader.setConfig({
    enabled: true
});

Ext.application({
    name: 'fusip',

    appFolder: 'Scripts/app',
    controllers: [
    ],
    
    launch: function() {
        var panelInicio = Ext.create('Ext.Panel', {
            id: 'home',
            title: 'Dashboard',
            contentEl: 'content',
            bodyStyle: 'background-color: transparent',
            autoScroll: true
        });
        var panelPrincipal = Ext.create('Ext.tab.Panel', {
            region: 'center',
            id: 'main',
            items: [panelInicio, {title:'Admisnitracion', html: 'Modulo de admisnitracion'}]
        });

        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [{
                contentEl: 'header',
                region:'north'
            }, panelPrincipal, {
                contentEl: 'footer',
                border: false,
                region:'south'
            }]
        });
    }
});