Ext.onReady(function(){
    Ext.QuickTips.init();
	
	new Ext.Viewport({
		layout: 'border',
		title: 'Sistema de Citas',
		items: [{
			xtype: 'box',
			region: 'north',
			height: 150,
			applyTo: 'head'
		},{
			xtype: 'box',
			region: 'center',
			applyTo: 'bodyWeb'			
		},{
			xtype: 'box',
			region: 'south',
			applyTo: 'foot'
		}],
        renderTo: Ext.getBody()
    });

	var login = new Ext.FormPanel({ 
        labelWidth:120,
        url:'index.php', 
        frame:true, 
        title:'Iniciar sesión', 
        defaultType:'textfield',
		monitorValid:true,
        items:[{ 
                fieldLabel:'Nombre de Usuario',
				id: 'user',
                name:'loginusername', 
				blankText: 'Debe ingresar su nombre de usuario',
                allowBlank:false 
            },{ 
                fieldLabel:'Password', 
				id: 'pass',
                name:'loginpassword', 
                inputType:'password',
				blankText: 'Debe ingresar su contraseña',				
//              allowBlank:false,
				enableKeyEvents: true,
				listeners: {
					specialkey: function(f, o){
						if(o.getKey()==13){
							//f.submit();
							//var form = f.ownerCt.getForm();
							Ext.getCmp('btnLogin').handler.call();
							//Para mandar solo el click
							//var element = Ext.getCmp("btnLogin");
							//element.fireEvent('click',element);
							//Para mandar ambos eventos 
							//Ext.getCmp("btnLogin").handler.call(Ext.getCmp("btnLogin").scope);
						}
					}
					
				}
				
				
            }],
 
        buttons:[{ 
                text:'Login',
				id: 'btnLogin',
                formBind: true,	 
                // El handler se dispara cuando hacemos click en el boton 
                handler:function(){ 
                    login.getForm().submit({ 
                        method:'POST',
                        waitTitle:'Conectando al colegio...', 
                        waitMsg:'Enviando Datos...',
						// Cuando el 
                        success:function(){ 
							var redirect = 'php/entornoPadres.php';
							window.location = redirect;
						},
                        failure:function(form, action){ 
                            if(action.failureType == 'server'){ 
                                obj = Ext.util.JSON.decode(action.response.responseText); 
                                Ext.Msg.alert('Error', 'No se pudo iniciar sesión! Verifique su usuario y contraseña',function(btn, text){
								if (btn == 'ok'){
									Ext.getCmp('user').focus(true,200);
                                }});
                            }else{ 
                                Ext.Msg.alert('Advertencia!', 'El servidor del colegio no esta disponible : ' + action.response.responseText); 
                            } 
                            //login.getForm().reset();
                        } 
                    }); 
                } 
            }] 
    });

	// This just creates a window to wrap the login form. 
	// The login object is passed to the items collection.       
    var win = new Ext.Window({
        layout:'fit',
        width:320,
        height:150,
        closable: false,
        resizable: false,
        plain: false,
        border: true,
        items: [login]
	});
	win.show('body');
	Ext.getCmp('user').focus(true,200);
});