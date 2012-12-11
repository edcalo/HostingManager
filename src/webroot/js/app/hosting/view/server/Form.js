Ext.define('labinfsis.hosting.view.server.Form', {
    extend: 'Ext.window.Window',
    alias : 'widget.serverform',
    title : 'Registrar servidor',
    layout: 'fit',
    autoShow: true,
    modal:true,
    width: 550,
    requires:[
    'Ext.ux.form.MultiSelect',
    'Ext.ux.form.ItemSelector'
    ],
    iconCls: 'icon-add',
    initComponent: function() {
        this.items = [{
            xtype: 'form',
            border:false,
            bodyStyle: 'padding:10px; background-color:#DFE9F6',
            fieldDefaults: {
                labelAlign: 'top'
            },
            items: [{
                name:'id',
                xtype: 'hidden'
            },{
                xtype: 'container',
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:.35,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        name : 'server_name',
                        fieldLabel: 'Nombre',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.65,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        name : 'fqdn',
                        fieldLabel: 'Nombre de dominio completo',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'100%'
                    }]
                }]
            },{
                xtype: 'container',
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:.55,
                    layout: 'anchor',
                    items: [{                        
                        xtype: 'combo',
                        fieldLabel: 'Funcionalidad',
                        valueField: 'field',
                        displayField: 'label',
                        value: 'mail',
                        editable: false,
                        anchor:'90%',
                        store: Ext.create('Ext.data.Store', {
                            fields: ['field', 'label'],
                            proxy : {
                                type: 'memory',
                                data  : [{
                                    label: 'Servidor de Correo',
                                    field: 'mail'
                                }, {
                                    label: 'Servidor de Archivos',
                                    field: 'samba'
                                }, {
                                    label: 'Servidor Ftp',
                                    field: 'ftp'
                                }, {
                                    label: 'Servidor de Base de Datos(PostgreSQL)',
                                    field: 'postgresql'
                                }, {
                                    label: 'Servidor de Base de Datos(MySQL)',
                                    field: 'mysql'
                                }, {
                                    label: 'Servidor de Proxy',
                                    field: 'proxy'
                                }]
                            }
                        })                        
                    }]
                },{
                    columnWidth:.45,
                    xtype: 'container',
                    anchor: '100%',
                    defaults: {
                        anchor: '100%',
                        layout: {
                            type: 'hbox'
                        }
                    },
                    items: [{
                        xtype: 'fieldcontainer',
                        combineErrors: true,
                        fieldLabel: 'Direccion IPv4 del servidor y puerto',
                        msgTarget: 'side',
                        defaults: {
                            hideLabel: true,
                            allowBlank: false
                        },
                        items: [{
                            xtype: 'textfield',    
                            fieldLabel: 'Phone 1', 
                            name: 'phone-1', 
                            width: 29,
                        },{
                            xtype: 'displayfield', 
                            value: '.'
                        },{
                            xtype: 'textfield',    
                            fieldLabel: 'Phone 2', 
                            name: 'phone-2', 
                            width: 29                            
                        },{
                            xtype: 'displayfield', 
                            value: '.'
                        },{
                            xtype: 'textfield',    
                            fieldLabel: 'Phone 2', 
                            name: 'phone-3', 
                            width: 29
                        },{
                            xtype: 'displayfield', 
                            value: '.'
                        },{
                            xtype: 'textfield',    
                            fieldLabel: 'Phone 2', 
                            name: 'phone-4', 
                            width: 29, 
                            allowBlank: false
                        },{
                            xtype: 'displayfield', 
                            value: ':'
                        },{
                            xtype: 'textfield',    
                            fieldLabel: 'Phone 3', 
                            name: 'phone-3', 
                            width: 48
                        }
                        ]
                    }]
                }]
            },{
                xtype: 'htmleditor',
                name : 'server_description',
                fieldLabel: 'Descripción',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            },{
                xtype: 'label',
                forId: 'members',
                html: '<br>Mienbros',
                style: {
                    paddingTop:'10px'
                }
            },{
                anchor: '100%',
                xtype: 'itemselector',
                buttons:['add', 'remove'],
                msgTarget: 'side',
                name : 'members',
                fieldLabel: 'Seleccione el o los usuarios que tienen habilitada(s) su(s) cuenta(s) en este servidor',
                allowBlank: false,
                store: Ext.data.StoreManager.lookup('Accounts'),
                displayField: 'userid',
                valueField:'id'
            }]
        }];

        this.buttons = [{
            text: 'Save',
            action: 'save',
            iconCls:'icon-guardar'
        },{
            text: 'Cancel',
            scope: this,
            handler: this.close,
            iconCls:'icon-cancelar'
        }];

        this.callParent(arguments);
    }
});