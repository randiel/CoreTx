<?php session_start();

include('../siteConfig.php');
include('../class/dbConector.php');

//$userData = array();
//$aHijos = array();
//$objDB = new dbConector($siteConfig);
//$userData = $objDB->sp_exec($siteConfig, "CALL spConsultarPadreFamilia('".$_SESSION['codigousuario']."');");
//$aHijos = $objDB->sp_exec($siteConfig, "CALL spObtenerHijos('".$_SESSION['codigousuario']."');");

$cad = "[{
                fieldLabel: 'Curso',
                name: 'first',
                allowBlank:false
            },{
                fieldLabel: 'Profesor',
                name: 'last'
            },{
                fieldLabel: 'Dia',
                id:'date',
                name: 'date'
            },
				time, cal,
			{
                fieldLabel: 'Email',
                name: 'email',
                vtype:'email'
            }]";

echo $cad;

?>