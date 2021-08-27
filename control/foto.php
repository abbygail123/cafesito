<?php	
		$carpeta="../fotos/";		
				
	    if(isset($_FILES['n-input-id']))
		{
				$cantidad= count($_FILES["n-input-id"]["tmp_name"]);
				for ($i=0; $i<$cantidad; $i++)
				{
					$info = pathinfo($_FILES['n-input-id']['name'][$i]);   
					$nombreImagen[$i]=md5(rand().time()).".".$info['extension'];
					//$nombreImagen[$i]=$_FILES['nImagenes']['name'][$i];
					//if($i==0)
					   //$imagenP=$nombreImagen[$i];
					$destino = $carpeta . $nombreImagen[$i];					
					//Subimos el fichero al servidor
					move_uploaded_file($_FILES["n-input-id"]["tmp_name"][$i], $destino);
				}
				$respuesta=array("mensaje"=>$nombreImagen[0]);
                echo json_encode($respuesta);		   
               
		}

?>