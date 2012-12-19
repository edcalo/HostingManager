Ext.define('labinfsis.hosting.view.server.Selector', {
    extend: 'Ext.form.FieldContainer',
    alias : 'widget.serverselector',
    combineErrors: true,
    msgTarget: 'side',
    layout: 'hbox',
    defaults: {
        hideLabel: true
    },
    initComponent: function() {
        this.items=[{
                flex:           1,
                xtype:          'combo',
                mode:           'local',
                triggerAction:  'all',
                forceSelection: true,
                editable:       true,
                name:           this.name,
                displayField:   'server_name',
                valueField:     'id',
                store:          'Servers',
                allowBlank:     this.allowBlank,
                multiSelect: true,
                listConfig:     {
                    emptyText: 'No se han encontrado servidores.',
                    getInnerTpl : function() {
                        return '<div class="x-combo-list-item"><img src="' + Ext.BLANK_IMAGE_URL + '" class="chkCombo-default-icon chkCombo" /> {server_name} </div>';
                    }
                }
            },{
                xtype:          'button',
                iconCls:        'icon-add',
                handler:        this.showFormAdd
            }]
        

        this.callParent(arguments);
    },
    showFormAdd: function(){
        Ext.widget('server');
    }
});
