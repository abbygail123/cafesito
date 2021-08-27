function guardarDistrito()
{
    var val=document.getElementById("buGuardar").value;
    if(val=="0")
    {
        var cod=document.getElementById("idCodigo").value;
        var dis=document.getElementById("idDistrito").value;
        var op="guardarDistrito";
        $.ajax({
            type:"POST",
            url:"../control/control.php",
            data:{"cod":cod,"dis":dis,"op":op},
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
    }
    else{
        modificarDistrito(val);
    }
}


function mensaje(val)
{
  $('#idModal').modal('show');
  document.getElementById("idFooter").innerHTML="<button type='button' class='btn btn-secondary' data-dismiss='modal'>NO</button>"+
                                                "<button type='button' class='btn btn-primary' onclick=\"eliminarDistrito('"+val+"')\">SI</a>";

}

function mostrar(val)
{
    $("table tbody tr").click(function() {
      
        document.getElementById("idCodigo").value=$(this).find("td:eq(0)").text();
        document.getElementById("idDistrito").value=$(this).find("td:eq(1)").text();
        document.getElementById("buGuardar").value=val;
    });
}

function eliminarDistrito(id)
{
    var op="eliminarDistrito";
    $.ajax({
        type:"POST",
        url:"../control/control.php",
        data:{"cod":id,"op":op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se elimino correctamente');
               document.getElementById("idLista").innerHTML=respuesta.tabla;  
               $("#idTabla").bootstrapTable(); 
               $('#idModal').modal('hide'); 

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  

}

function modificarDistrito(val)
{
    var cod=document.getElementById("idCodigo").value;
    var dis=document.getElementById("idDistrito").value;
    var op="modificarDistrito";
    $.ajax({
        type:"POST",
        url:"../control/control.php",
        data:{"cod":cod,"dis":dis,"val":val,"op":op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se modifico correctamente');
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
    document.getElementById("idCodigo").value="";
    document.getElementById("idDistrito").value="";
    document.getElementById("buMostrar").value="0";
}