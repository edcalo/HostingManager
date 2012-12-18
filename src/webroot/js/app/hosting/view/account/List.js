Ext.define('labinfsis.hosting.view.account.List' ,{
    extend: 'Ext.grid.Panel',
    store: 'Accounts',
    alias : 'widget.accountlist',
    title : 'Clientes de Hosting',
    iconCls: 'icon-online',
        
    initComponent: function() {
        this.columns = [
        Ext.create('Ext.grid.RowNumberer'),
        {
            header: 'Nombre',
            dataIndex: 'account_name'
        },{
            header: 'Email',
            dataIndex: 'email'
        },{
            header: 'UserID',
            dataIndex: 'user_id'
        },{
            header: 'Group',
            dataIndex: 'gid'
        },{
            header: 'Status',
            dataIndex: 'status'
        },{
            header: 'Expired',
            dataIndex: 'expired'
        },{
            header: 'HomeDir',
            dataIndex: 'home_dir'
        },{
            header: 'Accessed',
            dataIndex: 'accessed'
        }];
        this.viewConfig= {
            stripeRows: true
        };
        this.groupField = 'gid';
        this.hideGroupedHeader = true;
        var sm = Ext.create('Ext.selection.CheckboxModel');
        this.selModel = sm;
        var groupingFeature = Ext.create('Ext.grid.feature.Grouping',{
            groupHeaderTpl: 'Grupo: {gid} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})'
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