Ext.Loader.setConfig({
    enabled: true
});
Ext.Loader.setPath('Ext.ux', 'http://localhost/libs/extjs-4.1.1/examples/ux');
Ext.application({
    name: 'Hosting',
    appFolder: 'js/app/hosting',
    controllers: [
        'Accounts',
        'Servers'
    ],
    listGroups: function(){
        var groups = Ext.widget('serverlist');
        groups.show();
    },
    
    launch: function() {
        var panelInicio = Ext.create('Ext.Panel', {
            id: 'home',
            title: 'Dashboard',
            contentEl: 'content',
            bodyStyle: 'background-color: transparent',
            autoScroll: true
        });
        var panel_ftp=Ext.create('Ext.Panel',{
            title: 'Lista de Cuentas',
            layout: 'border',
            items:[{
                    xtype:'accountlist',
                    region:'center'
            },{
                title: 'Detalle de la cuenta seleccionada',
                collapsible: true,
                region:'east',
                html:'Detalle de la cuenta esto sera un user_ftp.View',
                width:400,
                margins: '0 0 5 5'

            }],
            tbar:[{
                title: 'Acciones',
                xtype: 'buttongroup',
                columns: 3,
                items:[{
                    xtype: 'buttongroup',
                    items:{
                        scale: 'large',                        
                        text: 'Registrar',
                        iconAlign: 'top',
                        iconCls: 'icon-add-aux'
                    }
                },{
                    xtype: 'buttongroup',
                    items:[{
                        id: 'editar',
                        text: 'Modificar',
                        scale: 'large',
                        iconAlign: 'top',                        
                        iconCls: 'icon-edit-aux'
                    },{
                        id: 'eliminar',
                        text: 'Eliminar',
                        iconCls:'icon-delete-aux',
                        scale: 'large',
                        iconAlign: 'top'
                    }]
                },{
                    xtype: 'buttongroup',
                    defaults:{
                        scale: 'large',
                        iconAlign: 'top'
                    },
                    items:[{
                        text: 'Buscar',                        
                        iconCls: 'icon-buscar-aux'
                    },{

                        text: 'Ordenar',
                        iconCls:'icon-ordenar-aux',
                        handler: this.listGroups
                    }]
                }]
            },{
                title: 'Configuracion de fuente de datos',
                xtype: 'buttongroup',
                columns: 4,
                defaults:{
                    scale: 'large',
                    iconAlign: 'top'
                },
                items:[{
                    xtype: 'buttongroup',
                    defaults:{
                        scale: 'large',
                        iconAlign: 'top'
                    },
                    items:[{
                        text: 'Gestiones',                        
                        iconCls: 'icon-gestion-32'
                    },{
                        text: 'Turnos',
                        iconCls: 'icon-turno-32'
                    },{
                        text: 'Unidades',
                        iconCls:'icon-unidad-32'
                    }, {
                        text: 'Cargos',
                        iconCls:'icon-cargos-32'

                    }]
                }]
            }]
        });
        var panelPrincipal = Ext.create('Ext.tab.Panel', {
            region: 'center',
            id: 'main',
            items: [panelInicio, panel_ftp]
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