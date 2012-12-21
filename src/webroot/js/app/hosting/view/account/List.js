Ext.define('labinfsis.hosting.view.account.List' ,{
    extend: 'Ext.grid.Panel',
    store: 'Accounts',
    alias : 'widget.accounts',      
    initComponent: function() {
        this.columns = [
        Ext.create('Ext.grid.RowNumberer'),
        {
            header: 'Servidor',
            dataIndex: 'server'
        },{
            header:'Usuario',
            dataIndex:'user'
        },{
            header: 'Nombre de la cuenta',
            dataIndex: 'account_name'
        },{
            header: 'Email de contacto',
            dataIndex: 'email'
        },{
            header: 'Quota',
            dataIndex: 'quota'
        },{
            header: 'Directorio de Trabajo',
            dataIndex: 'home_dir'
        },{
            header: 'Ultimo Acceso',
            dataIndex: 'accessed',
            renderer:Ext.util.Format.dateRenderer('d/m/Y')
        },{
            header:'Fecha expiracion',
            dataIndex:'expired',
            renderer: Ext.util.Format.dateRenderer('d/m/Y')
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
            stripeRows: true,
            enableTextSelection: true
        
        };
        this.groupField = 'server';
        this.hideGroupedHeader = true;
        var sm = Ext.create('Ext.selection.CheckboxModel');
        this.selModel = sm;
        var groupingFeature = Ext.create('Ext.grid.feature.Grouping',{
            groupHeaderTpl: 'Grupo: {server} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})'
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