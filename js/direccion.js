function guardar()
{
    var val_=document.getElementById("boton").value;
    if(val_=="0"){
        var dis = document.getElementById("idDistrito").value;
        var op = "guardar";

        $.ajax({
            type:"POST",
            url:"../control/condirec.php",
            data:{dis,op},
            dataType:"json",//JavaScript Object Notation
            success: function(respuesta){		  
                if(respuesta.mensaje==true)
                {    
                toastr.success('Se agrego correctamente');
                document.getElementById("idLista").innerHTML=respuesta.tabla;  
                $("#idTabla").bootstrapTable();
                clear();
                }
                else
                {
                alert(respuesta.mensaje);
                }
            }
        });

    }else{
        modificar(val_);
    }
     
}




function mensaje(val)
{
  $('#Modal').modal('show');
  document.getElementById("idfooter").innerHTML="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>"+
                                                "<button type='button' class='btn btn-primary' onclick='eliminar("+val+")'>Eliminar</button>";
}
function eliminar(id)
{
    var op="eliminar";
    $.ajax({
        type:"POST",
        url:"../control/condirec.php",
        data:{"cod":id,"op":op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se elimino correctamente');
               document.getElementById("idLista").innerHTML=respuesta.tabla;  
               $("#idTabla").bootstrapTable(); 
               $('#Modal').modal('hide'); 

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  

}

function mostrar(val_)
{
    
    $("table tbody tr").click(function(){
       /*  document.getElementyById("id_direccion").value=$(this).find("td:eq(0)").value(); */
        document.getElementById("idDistrito").value=$(this).find("td:eq(1)").text();
        document.getElementById("boton").value=val_;

    });     
}


function modificar(val){
    var dis=document.getElementById("idDistrito").value;
    var op="modificar";

    $.ajax({
        type:"POST",
        url:"../control/condirec.php",
        data:{dis,val,op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {    
            toastr.success('Se actualizo correctamente');
            document.getElementById("idLista").innerHTML=respuesta.tabla;  
            $("#idTabla").bootstrapTable();
            clear();
            }
            else
            {
                alert(respuesta.mensaje);
            }
        }
    });
}

function clear()
{
    /* document.getElementById("idCodigo").value=""; */
    document.getElementById("idDistrito").value="";
    document.getElementById("boton").value="0";
}
