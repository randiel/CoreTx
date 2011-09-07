<?php
/*
* Empresa		: BlackPrince S.A. 2009
* Aplicación	: Sistemas de Citas
* Análisis		: R&R
* Desarrollo	: Randiel J. Melgarejo
* Fecha			: Viernes, 07 de agosto 2009 
**
**
**
*/

$js .= "
    var treePanel = new Ext.tree.TreePanel({
    	id: 'tree-panel',
    	title: 'Relacion de hijos',
        region:'north',
        split: true,
        height: 300,
        minSize: 150,
        autoScroll: true,        
        rootVisible: false,
        lines: true,
        singleExpand: false,
        useArrows: true,
        loader: new Ext.tree.TreeLoader({
            //dataUrl:'../json/tree-data.json'	
            dataUrl:'../php/tree-data.php'				
        }),
        
        root: new Ext.tree.AsyncTreeNode()
    });
    
    treePanel.on('click', function(n){
    	var sn = this.selModel.selNode || {};
    	if(n.leaf && n.id != sn.id){
    		Ext.getCmp('content-panel').layout.setActiveItem(n.id + '-panel');
    		if(!detailEl){
    			var bd = Ext.getCmp('details-panel').body;
    			bd.update('').setStyle('background','#000');
    			detailEl = bd.createChild();
    		}
    		detailEl.hide().update(Ext.getDom(n.id+'-details').innerHTML).slideIn('l', {stopFx:true,duration:.2});
    	}
    });
";
?>