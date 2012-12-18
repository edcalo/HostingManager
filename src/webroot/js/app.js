Ext.Loader.setConfig({
    enabled: true
});
Ext.Loader.setPath('Ext.ux', 'http://localhost/libs/extjs-4.1.1/examples/ux');
Ext.apply(Ext.form.field.VTypes, {
    ipv4:  function(v) {
        var ip =/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
        return ip.test(v);
    },
    ipv4Text: 'Must be a numeric IP address',
    ipv4Mask: /[\d\.]/i
});
Ext.application({
    name: 'labinfsis.hosting',
    appFolder: 'js/app/hosting',
    controllers: [
        'Accounts',
        'Servers',
        'Services'
    ],
    listarServidores: function(){
        var servidores = Ext.widget('servers');
        servidores.show();
    },
    listarServicios: function(){
       var servicios = Ext.widget('services');
        servicios.show(); 
    },    
    launch: function() {
        var panelInicio = Ext.create('Ext.Panel', {
            id: 'home',
            title: 'Dashboard',
            contentEl: 'content',
            bodyStyle: 'background-color: transparent',
            autoScroll: true
        });
        var panel_cuentas=Ext.create('Ext.Panel',{
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
                }]
            },{
                title: 'Configuracion',
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

                        text: 'Servidores',
                        iconCls:'icon-server',
                        handler: this.listarServidores
                    },{
                        text: 'Servicios',                        
                        iconCls: 'icon-services',
                        handler: this.listarServicios
                    }]
                }]
            }]
        });
        var panelPrincipal = Ext.create('Ext.tab.Panel', {
            region: 'center',
            id: 'main',
            items: [panelInicio, panel_cuentas]
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