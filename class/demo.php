<?php

//if ($_POST) {
include 'dbConector.php';
include 'eventListener.php';
include '../siteConfig.php';
include 'navigatorWeb.php';

session_start();

$getArray = array();
$getArray['loginusername'] = isset($_POST["loginUsername"]) ? $_POST["loginUsername"] : "rmelgarejo";
$getArray['loginpassword'] = isset($_POST["loginPassword"]) ? $_POST["loginPassword"] : "d3s@";
$valido = '';

$db = new dbConector($siteConfig); 
$ev = new eventListener();
$nw = new navigatorWeb();

//$resultBR["xy"]="";

	//"CALL spValidarUsuario('".$loginUsername."','".$loginPassword."');"
	
	foreach ($_POST as $key => $value)
		$getArray[$key] = $value;
	
	$resultBR = $ev->rulesExec($siteConfig, $db, 'rules_btnIniciar', $getArray);
		
	if($resultBR["success"])
		$resultBR["xy"] = $resultBR["xy"]."0";
	else
		$resultBR["xy"] = $resultBR["xy"]."1";
	
	echo json_encode($resultBR);
//}
    //$rezults=$db->get("SELECT * FROM user");
/*
	Array $rezults:
	&status - Estado del recordset
	&cols - # de campos
	$rows - # de filas
	&total - # de celdas (cols * rows)
	&fieldname - Array con los nombres de los campos
	<nombre_campo>[num_fila] - Valor de la celda
	
	Uso:
	$num_columnas = $rezults["&cols"];
	$arr_campos = $rezults["&fieldname"];
	$dato = $rezults["id"][0];
*/

/*
	$rezults = $db->sp_exec($siteConfig, "CALL spConsultarUsuarios();"); 
	var_dump($rezults);
	echo "<br>";
    //if ($rezults["&rows"]!=0){//we have records 
	echo "<br>";
		
	var_dump($rezults["&fieldname"]);
	echo "<br>";
	echo $rezults["nombre"][0];
	echo "<br>";
	
	echo "<br>";
    for($i=0;$i<$rezults["&rows"];$i++){ 
            //output result as you like
	    for($j=0;$j<$rezults["&cols"];$j++){ 
			$col = $rezults["&fieldname"][$j];
			echo $rezults[$col][$i]." | ";
		}
		echo "<br>";
    }
  //  } 
 
if ($rezults){
    $result["success"] = true;
} else {
    $result["success"] = false;
    $result["errors"]["reason"] = "Error al iniciar sesión. Intente de nuevo.";
}*/

?>