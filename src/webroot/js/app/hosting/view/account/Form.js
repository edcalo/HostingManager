Ext.define('labinfsis.hosting.view.account.Form', {
    extend: 'Ext.window.Window',
    alias : 'widget.account',
    title : 'Registrar cuenta',
    layout: 'fit',
    iconCls: 'icon-add',
    width: 550,
    autoShow: true,
    modal:true,
    initComponent: function() {
        this.items = {
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
                    columnWidth:.50,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        name : 'account_name',
                        fieldLabel: 'Nombre',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.50,
                    layout: 'anchor',
                    bodyStyle: 'backgrounf: transparent;',
                    items: [{
                        xtype: 'serverselector',
                        name : 'servers',
                        fieldLabel: 'Habilitar cuenta en los Servidores',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
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
                    columnWidth:.50,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        name : 'account_password',
                        fieldLabel: 'Contraseña',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.50,
                    layout: 'anchor',
                    bodyStyle: 'backgrounf: transparent;',
                    items: [{
                        xtype: 'textfield',
                        name : 'account_password_repeat',
                        fieldLabel: 'Repetir contraseña',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'100%'
                    }]
                }]
            },{
                xtype: 'container',
                defaultType: 'radio', // each item will be a radio button
                layout: 'anchor',
                defaults: {
                    anchor: '100%',
                    hideEmptyLabel: false,
                },
                items: [ {
                    checked: true,
                    fieldLabel: 'Carpeta home del Usuario',
                    boxLabel: '/srv/cuenta.cs.umss.edu.bo',
                    name: 'home_dir_config',
                    inputValue: 'server_config'
                }, {
                    xtype:'fieldcontainer',
                    combineErrors: true,
                    msgTarget : 'side',
                    layout: 'hbox',
                    defaults: {                        
                        hideLabel: true
                    },
                    items:[{
                        name: 'home_dir_config',
                        inputValue: 'custom_config',
                        xtype:'radio'
                    },{
                        flex: 1,
                        xtype:'textfield',
                        name:'home_dir'
                    }]
                    
                }]
                    
            },{
                xtype: 'container',
                defaultType: 'radio', // each item will be a radio button
                layout: 'anchor',
                defaults: {
                    anchor: '100%',
                    hideEmptyLabel: false
                },
                items: [{
                    xtype:'fieldcontainer',
                    fieldLabel: 'Quota de disco para el usuario',
                    combineErrors: true,
                    msgTarget : 'side',
                    layout: 'hbox',
                    defaults: {                        
                        hideLabel: true,
                        xtype:'radio'
                    },
                    items:[{                        
                        boxLabel: '50 Mb', 
                        name: 'quota', 
                        inputValue: 50,
                        margins: '0 15 0 0'
                    },{
                        boxLabel: '100 Mb', 
                        name: 'quota', 
                        inputValue: 100,
                        margins: '0 15 0 0'
                    },{
                        boxLabel: '', 
                        name: 'quota', 
                        inputValue: 1
                    },{ 
                        xtype:'textfield',
                        name:'home_dir',
                        width: 35
                    },{
                        xtype: 'displayfield', 
                        value: 'Mb',
                        margins: '0 15 0 0'
                    },{
                        boxLabel: 'Ilimitado', 
                        name: 'quota', 
                        inputValue: 0
                    }]
                    
                }]
                    
            },{
                xtype: 'htmleditor',
                name : 'account_description',
                fieldLabel: 'Descripción',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            }]
        };

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