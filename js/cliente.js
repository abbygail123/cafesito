function listaUsuario(){
    console.log("hola");
	var tipo_operacion = "listar_Usuarios";
	$.ajax({
        url: '../Controller/Controller-User.php',
        type: "post",
        data: {"op":tipo_operacion},
        success: function(data){
			$("#listaUsuario").html(data);
        }
    });
}

function guardarCambiosCliente(){
    var tipo = document.getElementById('txttipo');
    var selected = tipo.options[tipo.selectedIndex].text;
    console.log(selected);
    var operacion = "actualizar_cliente";
    var id_cliente =  $("#id_usuario").val();
    $.ajax({
        url: '../Controller/Controller-User.php',
        type: 'post',
        data :{"op":operacion,"id":id_cliente,"tipo":selected},
        success: function(edit){
			if(edit=="actualizado"){
                $("#modalfrm_user").modal('hide');
                listaUsuario();
            }else{
                console.log("error");
            }
        }
    });
}

function eliminarUsuario(id){
    var tipo_operacion = "eliminar";
  $.ajax({
      url: '../Controller/Controller-User.php',
      type:'post',
      data: {"op":tipo_operacion,"idusuario":id},
      success:function(data){
          console.log(data);
          if(data=="eliminado"){
                listaUsuario();
                toastr.success("Se eliminó al usuario");
                tipo_operacion=null;
          }else{
              console.log("error");
          }
      }
  });
}

function verDatosCliente(id){
    var tipo_operacion = "obtener_Datos_Usuario";
    $.ajax({
        url: '../Controller/Controller-User.php',
        type:'post',
        data: { "id_user": id ,"op":tipo_operacion},
        success: function(data){
           // console.log(data);
            var usuario = JSON.parse(data);
            $("#id_usuario").val(usuario.idusuario);
			$("#txtnombre").val(usuario.nombre);
			$("#txtapellidos").val(usuario.apellido); 
			$("#txtdni").val(usuario.dni);
			$("#txttelefono").val(usuario.telefono);
			$("#txttipo").val(usuario.tipo);
			$("#modalfrm_user").modal('show');
        }
    });
}

/*function selectTipo(id){
    var tipo = document.getElementById('tipo');
    var selected = tipo.options[tipo.selectedIndex].text;
    console.log(selected);
    var tipo_operacion = "actualizar_Tipo";
    $.ajax({
        url: '../Controller/Controller-User.php',
        type:'post',
        data: {'tipo': selected, 'idusuario':id,"op":tipo_operacion},
        success: function(data){
            console.log(data);
			if(data=="actualizado"){
                listaUsuario();
                tipo_operacion="";
                toastr.success("Se actualizo al usuario");
                document.getElementById("tipo").value="";
			}else{
				alert("Error al actualizar los datos");
			}
        }
    });
}*/

const formulario = document.getElementById('formulario');
const cuadros = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{3,16}$/, // Letras, numeros, guion y guion_bajo
    nombres: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    telefono: /^\d{9}$/, // 9 numeros.
    dni: /^\d{8}$/, // 8 numeros.
	clave: /^.{4,12}$/ // 4 a 12 digitos.
	/* correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ */
}
const valores = {
    usuario: false,
    nombre: false,
    telefono: false,
    dni: false,
    clave: false
}
const validar = (e) =>{
    switch(e.target.name){
        case "usuario":
            validarcampos(expresiones.usuario, e.target, 'usuario');
        break;
        case "nombre":
            validarcampos(expresiones.nombres, e.target, 'nombre');
        break;
        case "telefono":
            validarcampos(expresiones.telefono, e.target, 'telefono');
        break;
        case "dni":
            validarcampos(expresiones.dni, e.target, 'dni');
        break;
        case "clave":
            validarcampos(expresiones.clave, e.target, 'clave');
            clave2();
        break;
        case "clave2":
            clave2();
        break;
    }
}

const validarcampos = (expresiones, input, campo) =>{
    if(expresiones.test(input.value)){
        document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo_${campo} i`).classList.add('fa-check');
        document.querySelector(`#grupo_${campo} i`).classList.remove('fa-times');
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        valores[campo] = true;
   }else{
       document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-incorrecto');
       document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-correcto');
       document.querySelector(`#grupo_${campo} i`).classList.add('fa-times');
       document.querySelector(`#grupo_${campo} i`).classList.remove('fa-check');
       document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
       valores[campo] = false;
   }
}

const clave2 = ()=>{
    const clave= document.getElementById('idClave');
    const clave2= document.getElementById('idclave2');
    if(clave.value !== clave2.value){
        document.getElementById(`grupo_clave2`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo_clave2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo_clave2 i`).classList.add('fa-times');
        document.querySelector(`#grupo_clave2 i`).classList.remove('fa-check');
        document.querySelector(`#grupo_clave2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        valores['clave'] = false;
    }else{
        document.getElementById(`grupo_clave2`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo_clave2`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo_clave2 i`).classList.remove('fa-times');
        document.querySelector(`#grupo_clave2 i`).classList.add('fa-check');
        document.querySelector(`#grupo_clave2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
        valores['clave'] = true;
    }
}


cuadros.forEach((input) => {
	input.addEventListener('keyup', validar);
	input.addEventListener('blur', validar);
});







function guardarCliente(){
    var id_= document.getElementById("buGuardar").value;
    if(id_==0)
    {   
        if(valores.usuario && valores.nombre && valores.telefono && valores.dni && valores.clave){
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
        var usuario=document.getElementById("idUsuario").value;
        var nombre=document.getElementById("idNombres").value;
        var apellido=document.getElementById("idApellidos").value;
        var telefono=document.getElementById("idTelefono").value;
        var dni=document.getElementById("idDni").value;
        var clave=document.getElementById("idClave").value;
        var op="guardarCliente";
        $.ajax({
            type:"POST",
            url:"../control/controlCliente.php",
            data:{usuario,nombre,apellido,telefono,dni,clave,op},
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
            toastr.error('Complete correctamenssste los datos');
        }     
    }
    else{
        if(valores.clave){
         
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
        modificarCliente(id_);
        }else{
            toastr.error('Complete correctameSSSnte los datos');
        } 
    }
}



/*
function mostrar(val_)
{
    document.getElementById('ff').style.display = 'block';		
    document.getElementById('cancelar').style.display = 'block';
     
    $("table tbody tr").click(function() {
        
        document.getElementById("idUsuario").value=$(this).find("td:eq(1)").text();
        document.getElementById("idNombres").value=$(this).find("td:eq(2)").text();
        document.getElementById("idTelefono").value=$(this).find("td:eq(3)").text();
        document.getElementById("idDni").value=$(this).find("td:eq(4)").text();
        var distrito=$(this).find("td:eq(5)").text();
        $("#idDistrito").find('option:contains("'+distrito+'")').prop('selected', true);

        document.getElementById("buGuardar").value=val_;
    });
    let text ="";
    if($("#buGuardar").text() === "Guardar"){
        text="Actualizar";
    }else{
        text="Actualizar";
    }
    $("#buGuardar").html(text);
//

}

/*
function modificarCliente(val)
{   

    var usuario=document.getElementById("idUsuario").value;
    var nombre=document.getElementById("idNombres").value;
    var telefono=document.getElementById("idTelefono").value;
    var dni=document.getElementById("idDni").value;
    var dis=document.getElementById("idDistrito").value;
    var clave=document.getElementById("idClave").value;
    var foto=document.getElementById("idRuta").value;

    var op="modificarCliente";
    
    $.ajax({
        type:"POST",
        url:"../control/controlCliente.php",
        data:{usuario,nombre,telefono,dni,dis,clave,foto,val,op},
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
    document.getElementById("idUsuario").value="";
    document.getElementById("idNombres").value="";
    document.getElementById("idTelefono").value="";
    document.getElementById("idDni").value="";
    document.getElementById("idDistrito").value="";
    document.getElementById("idClave").value="";
    document.getElementById("idclave2").value="";
}


function mensaje(val)
{
  $('#idModal').modal('show');
  document.getElementById("idFooter").innerHTML="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>"+
                                                "<button type='button' class='btn btn-danger' onclick='eliminarCliente("+val+")'>Eliminar</button>";
}

function eliminarCliente(id)
{
    var op="eliminarCliente";
    $.ajax({
        type:"POST",
        url:"../control/controlCliente.php",
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
$("#input-id").fileinput({
    //overwriteInitial: true,
    //defaultPreviewContent:"<img src='../img/user_vacio.jpg' class='file-preview-image' alt='user' title='user'>",
    browseClass: "btn btn-info btn-block",
    showCaption: false,
    showRemove: false,
    showUpload: false,
    initialPreview:["<img src='../fotos/gaga.jpg' class='file-preview-image' alt='user' title='user'>"],
    allowedFileExtensions:['jpg', 'png', 'jpeg'],
    uploadUrl: "../control/foto.php"

}).on('fileuploaded', function(e, respuesta) {
    document.getElementById("idRuta").value=respuesta.response.mensaje;
});*/