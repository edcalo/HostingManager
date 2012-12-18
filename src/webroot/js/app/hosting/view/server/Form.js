Ext.define('labinfsis.hosting.view.server.Form', {
    extend: 'Ext.window.Window',
    alias : 'widget.server',
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
                    columnWidth:.65,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        name : 'server_name',
                        fieldLabel: 'Nombre',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.35,
                    layout: 'anchor',
                    bodyStyle: 'backgrounf: transparent;',
                    items: [{
                        xtype: 'textfield',
                        name : 'ip',
                        fieldLabel: 'Direccion IP',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        msgTarget: 'side',
                        allowBlank: false,
                        vtype:'ipv4',
                        anchor:'100%'
                    }]
                }]
            },{
                xtype: 'textfield',
                name : 'fully_qualified_domain_name',
                fieldLabel: 'Nombre de dominio completo',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            },{
                xtype: 'htmleditor',
                name : 'server_description',
                fieldLabel: 'Descripción',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            },{
                xtype:'tabpanel',
                activeTab: 0,
                defaults:{
                    bodyPadding: 10,
                    layout: 'anchor'
                },
                items:[{
                    title: 'Cuentas',
                    items:{
                        anchor: '100%',
                        frame: true,
                        height:150,
                        xtype: 'itemselector',
                        buttons:['add', 'remove'],
                        msgTarget: 'side',
                        name : 'members',
                        fieldLabel: 'Seleccione el o los usuarios que tienen habilitada(s) su(s) cuenta(s) en este servidor',
                        store: Ext.data.StoreManager.lookup('Accounts'),
                        displayField: 'account_name',
                        valueField:'id'
                    }
                },{
                    title: 'Servicios',
                    items:{
                        anchor: '100%',
                        xtype: 'itemselector',
                        frame: true,
                        height:150,
                        buttons:['add', 'remove'],
                        msgTarget: 'side',
                        name : 'services',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        fieldLabel: 'Seleccione el o los servicios  habilitado(s) en este servidor',
                        store: Ext.data.StoreManager.lookup('Services'),
                        displayField: 'service_name',
                        valueField:'id'
                    }
                }]
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