Ext.define('labinfsis.hosting.view.account.Form', {
    extend: 'Ext.window.Window',
    alias : 'widget.account',
    title : 'Registrar cuenta',
    layout: 'fit',
    iconCls: 'icon-add',
    width: 550,
    autoShow: true,
    modal:true,
    requires:[
    'Ext.ux.form.PasswordMeter'
    ],
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
                xtype:'fieldcontainer',
                style: {
                    paddingTop:'15px '
                },
                combineErrors: true,
                msgTarget : 'side',
                layout: 'hbox',
                fieldLabel: 'Nombre Completo',
                defaults: {                        
                    hideLabel: true
                },
                items:[{
                    width:          50,
                    xtype:          'combo',
                    mode:           'local',
                    value:          'Univ',
                    triggerAction:  'all',
                    forceSelection: true,
                    editable:       false,
                    name:           'title',
                    displayField:   'name',
                    valueField:     'value',
                    queryMode: 'local',
                    store:          Ext.create('Ext.data.Store', {
                        fields : ['name', 'value'],
                        data   : [{
                            name : 'Univ',  
                            value: 'Univ'
                        },{
                            name : 'Lic', 
                            value: 'Lic'
                        },{
                            name : 'Ing', 
                            value: 'Ing'
                        }]
                    })
                },
                {
                    xtype: 'textfield',
                    flex : 1,
                    name : 'first_name',
                    fieldLabel: 'Nombres',
                    allowBlank: false
                },
                {
                    xtype: 'textfield',
                    flex : 1,
                    name : 'last_name',
                    fieldLabel: 'Apellidos',
                    allowBlank: false,
                    margins:'0 0 0 5'
                }]
                    
            },{
                xtype: 'container',
                style: {
                    paddingTop:'15px', 
                    paddingBottom:'15px'
                },
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:0.50,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        name : 'email',
                        fieldLabel: 'Email de contacto',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%',
                        vtype:'email'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.50,
                    layout: 'anchor',
                    bodyStyle: 'backgrounf: transparent;',
                    items: [{
                        xtype: 'textfield',
                        name : 'phone',
                        fieldLabel: 'Telefono de contacto',
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
                    columnWidth:0.65,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        name : 'account_name',
                        fieldLabel: 'Nombre de la cuenta',
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
                            fieldLabel: 'Estad de la cuenta',
                        xtype:          'combo',
                        mode:           'local',
                        value:          'disable',
                        triggerAction:  'all',
                        forceSelection: true,
                        editable:       false,
                        name:           'status',
                        displayField:   'name',
                        valueField:     'value',
                        queryMode: 'local',
                        anchor:'100%',
                        store:          Ext.create('Ext.data.Store', {
                            fields : ['name', 'value'],
                            data   : [{
                                name : 'Deshabilitado',  
                                value: 'disable'
                            },{
                                name : 'Habilitado',  
                                value: 'enable'
                            },{
                                name : 'Expirado', 
                                value: 'expired'
                            },{
                                name : 'Quorta excedida', 
                                value: 'quota_exeded'
                            }]
                        })
                    }]
                }]
            },{
                xtype: 'container',
                style: {
                    paddingTop:'15px '
                },
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:.50,
                    layout: 'anchor',
                    items: [{
                        xtype: 'passwordmeter',
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
                        xtype: 'passwordmeter',
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
                style: {
                    paddingTop:'15px'
                },
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:0.40,
                    layout: 'anchor',
                    items: [{
                        xtype: 'datefield',
                        name : 'expired',
                        fieldLabel: 'Fecha expiracion',
                        msgTarget: 'side',
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.60,
                    layout: 'anchor',
                    bodyStyle: 'backgrounf: transparent;',
                    items: [{
                        xtype: 'serverselector',
                        name : 'servers',
                        fieldLabel: 'Habilitar cuenta en los Servidores',
                        afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                        msgTarget: 'side',
                        allowBlank: false,
                        editable: false,
                        anchor:'100%'
                    }]
                }]
            },{
                xtype: 'container',
                style: {
                    paddingTop:'15px'
                },
                defaultType: 'radio',
                layout: 'anchor',
                defaults: {
                    anchor: '100%',
                    hideEmptyLabel: false
                },
                items: [ {
                    checked: true,
                    fieldLabel: 'Carpeta home del Usuario',
                    boxLabel: '{Directorio de trabajo del servidor}',
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
                style: {
                    paddingTop:'15px', 
                    paddingBottom:'15px'
                },
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
                        checked: true,
                        boxLabel: '50 Mb', 
                        name: 'quota_limit', 
                        inputValue: 50,
                        margins: '0 15 0 0'
                    },{
                        boxLabel: '100 Mb', 
                        name: 'quota_limit', 
                        inputValue: 100,
                        margins: '0 15 0 0'
                    },{
                        boxLabel: '', 
                        name: 'quota_limit', 
                        inputValue: 1
                    },{ 
                        xtype:'textfield',
                        name:'quota_limit',
                        width: 35
                    },{
                        xtype: 'displayfield', 
                        value: '&nbsp;Mb',
                        margins: '0 15 0 0'
                    },{
                        boxLabel: 'Ilimitado', 
                        name: 'quota_limit', 
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