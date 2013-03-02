Ext.define('labinfsis.hosting.view.account.List' ,{
    extend: 'Ext.grid.Panel',
    store: 'Accounts',
    alias : 'widget.accounts',      
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
                if(value > 0){                   
                    var valor = record.get('quota_tall')*100/value;
                    Ext.defer(function () {
                        Ext.widget('progressbar', {
                            renderTo: id,
                            value: valor/100,
                            text: record.get('quota_tall') + " / "+ value + " Mb" 
                        });
                    }, 50);
                    
                }else{
                    Ext.defer(function () {
                        Ext.widget('progressbar', {
                            renderTo: id,
                            value: 0,
                            text: " Ilimitado" 
                        });
                    }, 50);
                }
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
            width: 50,
            items: [/*{
                getClass: function(v, meta, rec) {          // Or return a class from a function
                    if (rec.get('change') < 0) {
                        this.items[1].tooltip = 'Hold stock';
                        return 'alert-col';
                    } else {
                        this.items[1].tooltip = 'Buy stock';
                        return 'buy-col';
                    }
                },
                icon   : '/img/icons/shared/16x16/delete16x16.png',  // Use a URL in the icon config
                tooltip: 'Delete account',
                handler: function(grid, rowIndex, colIndex) {
                    //var rec = store.getAt(rowIndex);
                    alert("??");
                }
            },*/{
                icon   : '/img/icons/shared/16x16/lock_break.png',  // Use a URL in the icon config
                tooltip: 'Reset password',
                handler: function(grid, rowIndex, colIndex) {
                    //var rec = store.getAt(rowIndex);
                    alert("?");
                }
            }]
        }];
        this.viewConfig= {
            stripeRows: false,
            enableTextSelection: true,
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
        
        this.bbar= Ext.create('Ext.PagingToolbar', {
            store: this.store,
            displayInfo: true,
            displayMsg: 'Mostrando {0} - {1} cuentas de  {2}',
            emptyMsg: "No hay cuentas registradas"
        });

        this.callParent(arguments);
    }

});