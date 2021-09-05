function guardarCategoria(){
    var categoria =$('#iddCategoria').val();
    var insertar_categoria = "insertar";
    if(!categoria){
        alert("Complete el campo");
    }else{
    $.ajax({
        url:'../Controller/Controller-Categoria.php',
        type:'post',
        data:{"categoria":categoria,"tipo":insertar_categoria},
        success: function(data){
            if(data == "registrado"){
                listarCategoria();
                document.getElementById("iddCategoria").value="";
            }else{
                console.log("error");
            }
        }
    });
}
}

function listarCategoria(){
    $.ajax({
        url: "../Controller/Listar-ComboBox.php",
        type: "post",
      //data: {"busca":busca},
        success: function(data){
			$("#categoria").html(data);
        }
    });
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
        url:"../control/conCategoria.php",
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

    //
    let text ="";
        if($("#botonca").text() === "Guardar"){
            text="Actualizar";
        }else{
            text="Actualizar";
        }
        $("#botonca").html(text);
    //
    $("table tbody tr").click(function(){
       /*  document.getElementyById("id_direccion").value=$(this).find("td:eq(0)").value(); */
        document.getElementById("iddCategoria").value=$(this).find("td:eq(1)").text();
        document.getElementById("botonca").value=val_;

    });     
}


function modificar(val){
    var categ=document.getElementById("iddCategoria").value;
    var op="modificar";

    $.ajax({
        type:"POST",
        url:"../control/conCategoria.php",
        data:{categ,val,op},
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
    document.getElementById("iddCategoria").value="";
    document.getElementById("botonca").value="0";
    //
    let text ="";
        if($("#botonca").text() === "Actualizar"){
            text="Guardar";
        }else{
            text="Guardar";
        }
        $("#botonca").html(text);
    //
}

////sub
function clearSub()
{
    document.getElementById("idSub").value="";
    document.getElementById("idCategoria").value=0;
   
    document.getElementById("botonSub").value=0;
    //
    let text ="";
        if($("#botonSub").text() === "Actualizar"){
            text="Guardar";
        }else{
            text="Guardar";
        }
        $("#botonSub").html(text);
    //
}
function guardarSub()
{    
    var val__=document.getElementById("botonSub").value;
    if(val__=="0")
    {
        var cate=document.getElementById("idCategoria").value;
        var subca=document.getElementById("idSub").value;
        
        var ope="guardarSub";
        
        $.ajax({
            type:"POST",
            url:"../control/conCategoria.php",
            data:{cate,subca,ope},
            dataType:"json",//JavaScript Object Notation
            success: function(respuesta){		  
                if(respuesta.mensaje==true)
                {
                   
                   toastr.success('Se agrego correctamente');
                   document.getElementById("idListaSub").innerHTML=respuesta.tabla;  
                   $("#idTablaSub").bootstrapTable();
                   clearSub();
                }
                else
                {
                  alert(respuesta.mensaje);
                }
            }
        });	      
    
    }
    else
    {
        modificarSub(val__);
    }
}

function modificarSub(vall)
{
    var cate=document.getElementById("idCategoria").value;
    var subca=document.getElementById("idSub").value;
   
    
    var ope="modificarSub";
    
    $.ajax({
        type:"POST",
        url:"../control/conCategoria.php",
        data:{cate,subca,vall,ope},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se modifico correctamente');
               document.getElementById("idListaSub").innerHTML=respuesta.tabla;  
               $("#idTablaSub").bootstrapTable();
               clearSub();
            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	      

}
function mostrarSub(val__)
{
    
    /* cancelar=document.getElementById("cancelar");
    cancelar.style.display="block"; */
    //
    let text ="";
        if($("#botonSub").text() === "Guardar"){
            text="Actualizar";
        }else{
            text="Actualizar";
        }
        $("#botonSub").html(text);
    //
    $("table tbody tr").click(function(){

        var categoria=$(this).find("td:eq(1)").text();
        $("#idCategoria").find('option:contains("'+categoria+'")').prop('selected', true);
        document.getElementById("idSub").value=$(this).find("td:eq(2)").text();    
      
        document.getElementById("botonSub").value=val__;
    

    });
}
function mensajeSub(val)
{
  $('#ModalS').modal('show');
  document.getElementById("idfooterS").innerHTML="<button type='button' class='btn btn-info' data-dismiss='modal'>Cancelar</button>"+
                                                "<button type='button' class='btn btn-danger' onclick='eliminarSub("+val+")'>Eliminar</button>";
}

function eliminarSub(id)
{
    var ope="eliminarSub";
    $.ajax({
        type:"POST",
        url:"../control/conCategoria.php",
        data:{"cod":id,"ope":ope},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se elimino correctamente');
               document.getElementById("idListaSub").innerHTML=respuesta.tabla;  
               $("#idTablaSub").bootstrapTable(); 
               $('#ModalS').modal('hide'); 

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  

}

