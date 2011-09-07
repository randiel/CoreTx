<?php session_start();

$codigoAlumno = $_GET['codigoAlumno'];
$_SESSION['codigoAlumno'] = $codigoAlumno;

include('../siteConfig.php');
include('../class/dbConector.php');

$aCursos = array();
$objDB = new dbConector($siteConfig);
	
$aCursos = $objDB->sp_exec($siteConfig, "CALL spObtenerCursos('".$codigoAlumno."','".$siteConfig['aplicacion:ano']."');");
$aProfesores = $objDB->sp_exec($siteConfig, "CALL spObtenerCursosProfesores('".$codigoAlumno."','".$siteConfig['aplicacion:ano']."');");

$cad="[{ ";
for($i=0; $i<$aCursos['&rows']; $i++){
	if ($aCursos['activo'][$i]){
		$cad .= "xtype: 'panel',";
		$cad .= "autoHeight: true,";
		$cad .= "title: '".$aCursos['nombre'][$i]."',";
		$cad .= "	bodyStyle: 'padding: 0px; margin: 0px',";
		$cad .= "border: true,";
		$cad .= "items: [{";
		for($j=0; $j<$aProfesores['&rows']; $j++){
			if ($aCursos['codigo'][$i]==$aProfesores['codigoCurso'][$j]){
				$cad .= "	xtype: 'panel',";
				$cad .= "	bodyStyle: 'padding: 0px; margin: 0px',";
				$cad .= "	height: 80,";
				$cad .= "	id: '".$aProfesores['codigoProfesor'][$j].$j."',";
				$cad .= "  html: \"<table class='x-table-lista'>";
				$cad .= "		  <tr>";
				if (!file_exists('../recursos/fotos/'.$aProfesores['codigoProfesor'][$j].'.jpg')){
					$cad .= "	  <td><a href=#><div id='profe01' style='position:absolute; width:20%; cursor:hand;'><img src='../images/nofoto.png'>";
				}
				else {
					$cad .= "	  <td><a href=#><img src='../recursos/fotos/'".$aProfesores['codigoProfesor'][$j]."'.jpg' ALIGN=TOP>";
				}		
				$cad .= "		  </div><div style='position:absolute; left:70px; width:70%; cursor:hand;'>";
				$cad .= "Codigo: ".$aProfesores['codigoProfesor'][$j]."<br>";
				$cad .= "Nombre: ".$aProfesores['paternoProfesor'][$j]." ".$aProfesores['maternoProfesor'][$j].", ".$aProfesores['nombresProfesor'][$j];
				$cad .= "		  </div></a></td>";
				$cad .= "		  </tr>";
				
				$cad .= "	\",";
				
				$cad .= "	listeners: {";
				$cad .= "		render: function(c){";
				$cad .= "			c.getEl().on('click', function(){";
				$cad .= "				Ext.get('txtCurso').dom.value = '".utf8_encode(html_entity_decode($aCursos['nombre'][$i]))."';";
				$cad .= "				Ext.get('txtProfesor').dom.value = '".utf8_encode(html_entity_decode($aProfesores['paternoProfesor'][$j]))." ".utf8_encode(html_entity_decode($aProfesores['maternoProfesor'][$j])).", ".utf8_encode(html_entity_decode($aProfesores['nombresProfesor'][$j]))."';";
				$cad .= "			}, c, {stopEvent: true});";
				$cad .= "				Ext.getCmp('cmbDias').store.load({params: {codigoProfesor: ".$aProfesores['codigoProfesor'][$j]."}});";
				$cad .= "				Ext.getCmp('cmbDias').setValue('');";
				$cad .= "				Ext.getCmp('cmbHorarios').setValue('');";				
				$cad .= "		}}";
				if ($j!=$aProfesores['&rows']-1){
					$cad .= "        },{";	
				}
			}
		}
		
		$cad .= "	}]";

		if ($i!=$aCursos['&rows']-1){
			$cad .= "        },{";	
		}
	}
}
$cad .= " }]";

echo $cad;

?>