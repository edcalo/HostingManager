Ext.Loader.setConfig({
    enabled: true
});

Ext.Loader.setPath('Ext.ux', '/Scripts/ExtJs/ux');

Ext.require([
    'Ext.tip.QuickTipManager',
    'Ext.container.Viewport',
    'Ext.layout.*',
    'Ext.form.Panel',
    'Ext.form.Label',
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.tree.*',
    'Ext.selection.*',
    'Ext.tab.Panel',
    'Ext.ux.layout.Center'  
]);

Ext.application({
    name: 'fusip',

    appFolder: '/Scripts/app',
    controllers: [
    ],

    launch: function () {
        var panelInicio = Ext.create('Ext.form.Panel', {
            region: 'center',
            labelWidth: 120,
            labelAlign: 'right',
            border: false,
            buttonAlign: 'center',
            cls: 'logo-login',
            monitorValid: true,
            url: '/Account/LogOn',
            bodyStyle: 'background: transparent; padding:5px 15px;',
            defaults: {
                xtype: 'textfield',
                allowBlank: false,
                height: 26,
                msgTarget: 'side'
            },
            items: [{
                name: 'UserName',
                fieldLabel: '<b class="grande">Usuario</b>',
                listeners: {
                    specialkey: function (field, e) {
                        if (e.getKey() == e.ENTER) {

                        }
                    }
                }
            }, {
                name: 'Password',
                inputType: 'password',
                fieldLabel: '<b  class="grande">Contrase&ntilde;a</b>',
                listeners: {
                    specialkey: function (field, e) {
                        if (e.getKey() == e.ENTER) {

                        }
                    }
                }
            }, {
                xtype: 'checkboxfield',
                boxLabel: 'Mantener session',
                name: 'RememberMe',
                inputValue: 'true'
            }],
            buttons: [{
                text: '<em class="grande">Ingresar</em>',
                scale: 'large',
                formBind: true,
                handler: function () {
                    panelInicio.getForm().submit();
                }
            }, {
                text: '<em class="grande">Cancelar</em>',
                scale: 'large',
                handler: function () {
                    panelInicio.getForm().reset();
                }
            }]
        });

        var panelLogin = Ext.create('Ext.Panel', {
            width: 450,
            height: '50%',
            minHeight: 350,
            frame: true,
            title: 'Introdusca sus credenciales para ingresar',
            items: [{
                region: 'north',
                contentEl: 'cabecera'
            }, panelInicio],
            bbar: ['<b>&copy; 2012 - Fundaci&oacute;n Som&oacute;n I. Pati&ntilde;o</b>']

        });


        Ext.create('Ext.container.Viewport', {
            minHeight: 600,
            minWidth: 800,
            autoScroll: true,
            layout: 'border',
            items: [{
                contentEl: 'header',
                region: 'north'
            }, {
                region: 'center',
                layout: 'ux.center',
                items: panelLogin,
                bodyCls: 'login'
            }, {
                contentEl: 'footer',
                border: false,
                region: 'south'
            }]
        });
    }
});