Ext.define('labinfsis.hosting.view.account.List' ,{
    extend: 'Ext.grid.Panel',
    store: 'Accounts',
    alias : 'widget.accounts',
    requires:[
    'Ext.ux.form.SearchField'
    ],
    initComponent: function() {
        this.columns = [{
            header: 'Servidor',
            dataIndex: 'servers',
            renderer: function(value, metaData, record, rowIndex, colIndex, store){                
                var st = Ext.data.StoreManager.get("Servers");
                var index = st.find('id',value);
                if(index >=0){
                    var row = st.getAt(index);
                    return row.get('server_name');       
                }else{
                    return value;
                }
            }
        },{
            header:'Nombre y Apellido',
            dataIndex:'first_name',
            renderer: function(value, metaData, record, rowIndex, colIndex, store){ 
                return value+'  '+record.get('last_name'); 
            },
            flex:1
        },{
            header: 'Nombre de la Cuenta',
            dataIndex: 'account_name',
            flex:1
        },{
            header: 'Email de contacto',
            dataIndex: 'email',
            flex:1
        },{
            header: 'Directorio de Trabajo',
            dataIndex: 'home_dir',
            flex:1
        },{
            header: 'Quota de disco',
            dataIndex: 'quota_limit',
            width:100,
            renderer: function (value, metaData, record, rowIndex, colIndex, store) {
                var id = Ext.id();
                Ext.defer(function () {
                    if(Ext.get(id)){
                        if(value > 0){
                            var valor = record.get('quota_tall')*100/value;
                            Ext.widget('progressbar', {
                                renderTo: id,
                                value: (valor / 100),
                                text: record.get('quota_tall') + " / "+ value + " Mb",
                                flex: 1
                            });
                        }else{
                            Ext.widget('progressbar', {
                                renderTo: id,
                                value: 0,
                                text: " Ilimitado" 
                            });
                        }
                    }
                }, 50);
                return Ext.String.format('<div id="{0}"></div>', id);
            }
        },{
            header: 'Ultimo Acceso',
            dataIndex: 'accessed',
            xtype:'datecolumn',
            format:'d/m/Y'
        },{
            header:'Fecha expiracion',
            dataIndex:'expired',
            xtype:'datecolumn',
            format:'d/m/Y'
        },{
            menuDisabled: true,
            sortable: false,
            xtype: 'actioncolumn',
            width: 100,
            items: [{
                iconCls: 'icon-edit',
                tooltip: 'Edit account'
            },{
                getClass: function(v, meta, rec) {          // Or return a class from a function
                    if (rec.get('is_delete')) {
                        this.items[1].tooltip = 'Enable';
                        return 'icon-ok';
                    } else {
                        this.items[1].tooltip = 'Disable';
                        return 'icon-delete';
                    }
                }
            },{
                iconCls: 'icon-passwordedit',
                tooltip: 'Reset password'
            }] 
        }];
        this.viewConfig= {
            stripeRows: false,
            enableTextSelection: false,
            getRowClass: function (record, rowIndex, rowParams, store) {
                var status = record.get('status');
                var result = '';
                switch(status){
                    case 'expired':
                        result = 'account-expired';
                        break;
                    case 'enable':
                        result = 'account-enable';
                        break;
                    case 'disable':
                        result = 'account-disable';
                        break;
                    case 'quota_exeded':
                        result = 'account-quota_exeded';
                        break;
                }
                return result;
            }
        
        };
        this.groupField = 'servers';
        this.hideGroupedHeader = true;
        var sm = Ext.create('Ext.selection.CheckboxModel');
        this.selModel = sm;
        var groupingFeature = Ext.create('Ext.grid.feature.Grouping',{
            groupHeaderTpl: '{columnName}: {name} ({rows.length} cuenta{[values.rows.length > 1 ? "s" : ""]})',
            hideGroupedHeader: true
        });
        this.features = [groupingFeature];
        this.border=false;
        this.bbar= Ext.create('Ext.PagingToolbar', {
            store: this.store,
            displayInfo: true,
            displayMsg: 'Mostrando {0} - {1} cuentas de  {2}',
            emptyMsg: "No hay cuentas registradas"
        });
        this.dockedItems= [{
            dock: 'top',
            xtype: 'toolbar',
            items: [{
                width: 400,
                fieldLabel: 'Search',
                labelWidth: 50,
                xtype: 'searchfield',
                store: Ext.data.StoreManager.lookup('Accounts')
            },  {
                xtype: 'component',
                tpl: 'Matching threads: {count}',
                style: 'margin-right:5px'
            }]
        }];

        this.callParent(arguments);
    }

});