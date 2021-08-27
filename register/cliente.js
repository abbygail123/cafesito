const formulario = document.getElementById('formulario');
const cuadros = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{3,16}$/, // Letras, numeros, guion y guion_bajo
    nombres: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    apellidos: /^[a-zA-ZÀ-ÿ\s]{3,40}$/,
    telefono: /^\d{9}$/, // 9 numeros.
    dni: /^\d{8}$/, // 8 numeros.
	clave: /^.{4,12}$/ // 4 a 12 digitos.
	/* correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ */
}
const valores = {
    usuario: false,
    nombre: false,
    apellidos: false,
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
        case "apellidos":
            validarcampos(expresiones.apellidos, e.target, 'apellidos');
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







function guardarCliente()
{
    var id_= document.getElementById("buGuardar").value;
    if(id_==0)
    {   
        if(valores.usuario && valores.nombre && valores.apellidos && valores.telefono && valores.dni && valores.clave){
         
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
          
        
        /* var cod=document.getElementById("idCodigo").value; */
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
                   alert('Se agrego correctamente');
                   window.location.assign("../login/login.php");
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
            toastr.error('Complete correctamente los datos');
        }     
    }
    else{
        if(valores.clave){
         
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
        modificarCliente(id_);
        }else{
            toastr.error('Complete correctamente los datos');
        } 
    }
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


 