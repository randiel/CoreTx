<?php
class dbConector
{
	var $con = null;
	
    function dbConector($siteConfig)
    {
		$this->con = $this->connect($siteConfig);		
    }

    function connect($siteConfig)
    {
		if(!($con=mysql_pconnect($siteConfig['server'],$siteConfig['user'],$siteConfig['pass'])))
            trigger_error("No se puede conectar al servidor!");
        if(!mysql_select_db($siteConfig['db']))
            trigger_error("La base de datos no esta disponible " . $siteConfig['db']);
        return $con;
    }

    function get($query)
    {
        if(strlen($query) > 4)
        {
            $result=mysql_query($query,$this->con);
            return $this->format($result);
        }
    }
	
	function format($sql)
	{
		$rez = array();
		if(mysql_error()=="")
		{
			$rez["&status"]="1";
			$rez["&cols"]=mysql_num_fields($sql);
			$rez["&rows"]=mysql_num_rows($sql);
			$rez["&total"]=$rez["&cols"]*$rez["&rows"];
			if($rez["&cols"]<=1 && $rez["&rows"]<=1)    // cols = 1, rows = 1
			{
				$sql1=mysql_fetch_array($sql);
				$rez["&val"]=$sql1[0];
				$fname = mysql_field_name($sql,0);
				$rez["&fieldname"] = array();
				$rez["&fieldname"][] = $fname;
				$rez[$fname]=array();
				$rez[$fname][]=$sql1[0];
			}
			elseif($rez["&cols"]<=1 && $rez["&rows"]>1)        // cols = 1, rows > 1
			{
				$i=0;
				$fname = mysql_field_name($sql,$i);
				$rez["&fieldname"] = array();
				$rez[$fname] = array();
				$rez["&fieldname"][] = $fname;
				while($sqlr=mysql_fetch_array($sql))
				{
					$rez[]=$sqlr[0];
					$rez[$fname][]=$sqlr[0];
					$i++;
				}
			}
			elseif($rez["&cols"]>1 && $rez["&rows"]<=1)    // cols > 1, rows = 1
			{
				$i=0;
				$rez["&fieldname"] = array();
				for($j=0;$j<$rez["&cols"];$j++)
				{
					$fname = mysql_field_name($sql,$j);
					$rez["&fieldname"][] = $fname;
					$rez[$fname] = array();
				}

				while($sqlr=mysql_fetch_array($sql))
				{
					for($j=0;$j<$rez["&cols"];$j++)
					{
						$rez[$rez["&fieldname"][$j]][]=$sqlr[$j];
						$rez[$j][]=$sqlr[$j];
					}
					$i++;
				}
			}
			elseif($rez["&cols"]>1 && $rez["&rows"]>1)        // cols > 1, rows > 1
			{
				$i=0;
				$rez["&fieldname"] = array();
				for($j=0;$j<$rez["&cols"];$j++)
				{
					$fname = mysql_field_name($sql,$j);
					$rez["&fieldname"][] = $fname;
					$rez[$fname] = array();
				}
				while($sqlr=mysql_fetch_array($sql))
				{
					for($j=0;$j<$rez["&cols"];$j++)
					{
						$fname = mysql_field_name($sql,$j);
						$rez[$fname][]=$sqlr[$j];
					}
					$i++;
				}
			}
			}
			else
			{
				$rez["&status"]="0";
				$rez["&error"]=mysql_error();
				echo "QUERY: $query<br>";
				trigger_error("ERROR: " . mysql_error());
			}
		mysql_free_result($sql);
		return $rez;
	}
	
	function formati($sql, $mysqli)
	{
		$rez = array();
		if(mysqli_error($mysqli)=="")
		{
			$rez["&status"]="1";
			$rez["&cols"]=mysqli_num_fields($sql);
			$rez["&rows"]=mysqli_num_rows($sql);
			$rez["&total"]=$rez["&cols"]*$rez["&rows"];
//			echo $rez["&cols"].", ".$rez["&rows"]."<br>";
			if($rez["&cols"]<=1 && $rez["&rows"]<=1)    // cols = 1, rows = 1
			{
				$fields = mysqli_fetch_fields($sql);
				$sql1=mysqli_fetch_array($sql);
				$rez["&val"]=htmlentities($sql1[0]);
//				$fname = mysql_field_name($sql,0);
				$fname = $fields[0]->name; 
				$rez["&fieldname"] = array();
				$rez["&fieldname"][] = $fname;
				$rez[$fname]=array();
				$rez[$fname][]=$sql1[0];
			}
			elseif($rez["&cols"]<=1 && $rez["&rows"]>1)        // cols = 1, rows > 1
			{
				$fields = mysqli_fetch_fields($sql);
				$i=0;
//				$fname = mysql_field_name($sql,$i);
				$fname = $fields[$i]->name; 
				$rez["&fieldname"] = array();
				$rez[$fname] = array();
				$rez["&fieldname"][] = $fname;
				while($sqlr=mysqli_fetch_array($sql))
				{
					$rez[]=$sqlr[0];
					$rez[$fname][]=htmlentities($sqlr[0]);
					$i++;
				}
			}
			elseif($rez["&cols"]>1 && $rez["&rows"]<=1)    // cols > 1, rows = 1
			{
				$fields = mysqli_fetch_fields($sql);
				$i=0;
				$rez["&fieldname"] = array();
				for($j=0;$j<$rez["&cols"];$j++)
				{
//					$fname = mysql_field_name($sql,$j);
					$fname = $fields[$j]->name; 
					$rez["&fieldname"][] = $fname;
					$rez[$fname] = array();
				}

				while($sqlr=mysqli_fetch_array($sql))
				{
					for($j=0;$j<$rez["&cols"];$j++)
					{
						$rez[$rez["&fieldname"][$j]][]=$sqlr[$j];
						$rez[$j][]=htmlentities($sqlr[$j]);
					}
					$i++;
				}
			}
			elseif($rez["&cols"]>1 && $rez["&rows"]>1)        // cols > 1, rows > 1
			{
				$fields = mysqli_fetch_fields($sql);
				$i=0;
				$rez["&fieldname"] = array();
				for($j=0;$j<$rez["&cols"];$j++)
				{
//					$fname = mysql_field_name($sql,$j);
					$fname = $fields[$j]->name; 
					$rez["&fieldname"][] = $fname;
					$rez[$fname] = array();
				}
				while($sqlr = mysqli_fetch_array($sql))
				{
					for($j=0;$j<$rez["&cols"];$j++)
					{
//						$fname = mysql_field_name($sql,$j);
						$fname = $fields[$j]->name; 
						$rez[$fname][]=htmlentities($sqlr[$j]);
					}
					$i++;
				}
			}
			}
			else
			{
				$rez["&status"]="0";
				$rez["&error"]=mysqli_error($mysqli);
				echo "QUERY: $query<br>";
				trigger_error("ERROR: " . mysqli_error($mysqli));
			}
		mysqli_free_result($sql);
		return $rez;
	}

    function query($query)
    {
        $sql=mysql_query($query,$this->con);
        $rez = array();
        if(mysql_error()=="")
        {
            $rez["&status"]="1";
            $lastid=$this->get("SELECT LAST_INSERT_ID() as lid");
            $rez["&id"]=$lastid["&val"];
        }
        else
        {
            $rez["&status"]="0";
            $rez["&error"]=mysql_error();
            echo "QUERY: $query<br>";
            trigger_error("ERROR: " . mysql_error());
        }
        return $rez;
    }

	function sp_exec($siteConfig, $exec)
	{	
		$mysqli = new mysqli( $siteConfig['server'],$siteConfig['user'],$siteConfig['pass'], $siteConfig['db']); 
		$mysqli->set_charset('utf-8');
		$ivalue=1; 
		if ($mysqli->multi_query($exec)) 
			if ($result = $mysqli->store_result()) 
				return $this->formati($result, $mysqli);			
		$mysqli->close();
	}
};

?>