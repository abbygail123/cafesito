
var categoriaa = document.getElementById("idCategoria");
var subcategoriaa = document.getElementById("idSubC");
/* function cargarCategoria(){
    $.ajax({
        type:"GET",
        url:"../control/controlProducto.php",
        success: function(rrr){
            var categorias = JSON.parse(rrr);
            var opciones = '<option value="0" class="form-control" selected disabled>--- ---</option>'
            categorias.forEach(categori => {
                opciones +=`<option value="${categori.idCa}">${categori.nomCa}</option>`
            });
            categoriaa.innerHTML = opciones;
        }
    });
    console.log(categoriaa);
}
cargarCategoria(); */

function cargarSubC(enviar){
    $.ajax({
        type:"POST",
        url:"../control/controlProducto.php",
        data: enviar,
        success: function(rrr){
            var subcategoria = JSON.parse(rrr);
            var opcioness = '<option value="0" class="form-control" selected disabled>--- ---</option>'
            subcategoria.forEach(subcategori => {
                opcioness +=`<option value="${subcategori.idSub}">${subcategori.nomSub}</option>`
            });
            subcategoriaa.innerHTML = opcioness;
        }
    });
    console.log(subcategoriaa);
}
categoriaa.addEventListener('change',() => {
   
    var codcate= categoriaa.value;
    
    var enviar={
        'codigo':codcate
    }
    cargarSubC(enviar)
})
//
function guardarProducto()
{
    var val_=document.getElementById("buGuardar").value;
    if(val_=="0")
    {
        var prod=document.getElementById("idProducto").value;
        var descr=document.getElementById("idDescripcion").value;
        var cat=document.getElementById("idCategoria").value;
        var subc=document.getElementById("idSubC").value;
        var marca=document.getElementById("idMarca").value;
        var talla=document.getElementById("idTalla").value;
        // var imagen=document.getElementById("idImag").value;
        var precio=document.getElementById("idPrecio").value;
        var stock=document.getElementById("idStock").value;
        var tipo=document.getElementById("idtipo").value;
        /* var oferta=document.getElementsByName("nOferta").value; */
        /* subir_imagenes(); */
        var op="guardarProducto";
        
        $.ajax({
            type:"POST",
            url:"../control/controlProducto.php",
            data:{prod,descr,cat,subc,marca,talla,precio,stock,tipo,op},
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
    else
    {
        modificarProducto(val_);
    }
  
}

function modificarProducto(val)
{
    var prod=document.getElementById("idProducto").value;
    var descr=document.getElementById("idDescripcion").value;
    var cat=document.getElementById("idCategoria").value;
    var subc=document.getElementById("idSubC").value;
    var marca=document.getElementById("idMarca").value;
    var talla=document.getElementById("idTalla").value;
    // var imagen=document.getElementById("idImag").value;
    var precio=document.getElementById("idPrecio").value;
    var stock=document.getElementById("idStock").value;
    var tipo=document.getElementById("idtipo").value;
    
    var op="modificarProducto";
    
    $.ajax({
        type:"POST",
        url:"../control/controlProducto.php",
        data:{prod,descr,cat,subc,marca,talla,precio,stock,tipo,val,op},
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

function mostrar(val_)
{
    sub=document.getElementById("sub");
    sub.style.display="block";
    //
    cancelar=document.getElementById("cancelar");
    cancelar.style.display="block";
    //
    let text ="";
        if($("#buGuardar").text() === "Guardar"){
            text="Actualizar";
        }else{
            text="Actualizar";
        }
        $("#buGuardar").html(text);
    //
    $("table tbody tr").click(function(){
        
        document.getElementById("idProducto").value=$(this).find("td:eq(2)").text();
        document.getElementById("idDescripcion").value=$(this).find("td:eq(3)").text();
    
        var categoria=$(this).find("td:eq(4)").text();
        $("#idCategoria").find('option:contains("'+categoria+'")').prop('selected', true);

        //
        var subcategoria=$(this).find("td:eq(5)").text();
        $("#idSubC").find('option:contains("'+subcategoria+'")').prop('selected', true);
        
        document.getElementById("idMarca").value=$(this).find("td:eq(6)").text();
        document.getElementById("idTalla").value=$(this).find("td:eq(7)").text();
       /*  document.getElementById("idImag").value=$(this).find("td:eq(7)").text(); */
        document.getElementById("idPrecio").value=$(this).find("td:eq(9)").text();
        document.getElementById("idStock").value=$(this).find("td:eq(10)").text();
        var tipo=$(this).find("td:eq(11)").text();
      
        document.getElementById("idtipo").value=tipo;
      

        document.getElementById("buGuardar").value=val_;
        habitalla();
        /* var fe=$(this).find("td:eq(4)").text();
        fe=fe.split("/");
        fe=fe.reverse();
        fe=fe.join("-"); */
        //console.log(fe);
        /* document.getElementById("idVencimiento").value=fe; */
        //
        
    
        
    });
}

function clear()
{
    document.getElementById("idProducto").value="";
    document.getElementById("idDescripcion").value="";
    document.getElementById("idCategoria").value="";
    // document.getElementById("sub").style.display="none";
    document.getElementById("idSubC").value="";
    document.getElementById("idMarca").value="";
    document.getElementById("idTalla").value="";
    document.getElementById("idTalla").disabled = true;
    // document.getElementById("idImag").value="";
    document.getElementById("idPrecio").value="";
    document.getElementById("idStock").value="";
    document.getElementById("idtipo").value="";
    document.getElementById("buGuardar").value=0;
}

function mensaje(val)
{
  $('#idmodal').modal('show');
  document.getElementById("idFooter").innerHTML="<button type='button' class='btn btn-info' data-dismiss='modal'>Cancelar</button>"+
                                                "<button type='button' class='btn btn-danger' onclick='eliminarProducto("+val+")'>Eliminar</button>";
}

function eliminarProducto(id)
{
    var op="eliminarProducto";
    $.ajax({
        type:"POST",
        url:"../control/controlProducto.php",
        data:{"cod":id,"op":op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se elimino correctamente');
               document.getElementById("idLista").innerHTML=respuesta.tabla;  
               $("#idTabla").bootstrapTable(); 
               $('#idmodal').modal('hide'); 

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  

}


function habitalla(){
    categoria = document.getElementById("idCategoria").value;

    if((categoria == 1) || (categoria == 2)){
        document.getElementById("idTalla").disabled = false;
    }else{
        document.getElementById("idTalla").disabled = true;
        document.getElementById("idTalla").value="";
    }

}

document.getElementById("idCategoria").addEventListener("change",habitalla);
//////
function mos(){
    moss=document.getElementById("idCategoria").value;
    sub=document.getElementById("sub");
        if( moss>=1){
            sub.style.display="block";
        }else{
            sub.style.display="none";
        }
}
$(document).ready(function() {
    
    $("#EliminarV").click(function(){
        var idd_array=[];
        $("input:checkbox[class=eliminarcheck]:checked").each(function(){
            idd_array.push($(this).val());
        })

        if(idd_array.length>0){
            console.log(idd_array);

            $.ajax({
                type:"POST",
                url:"../control/controlProducto.php",
                data:{"idda":idd_array},
                success: function(respuesta){	
                    //recorre los idd seleccionados
                    $.each(idd_array,function(){
                    
                    $('#id').remove(); 
                    });
                    window.location.assign("../gerencia/producto.php");
                }
            });
        }
        
    });
});

$("#idmodaloferta-lg").on("hidden.bs.modal", function () {
    $('#tablapro').bootstrapTable('remove', {

        index: 0,
        row: {
        cod: '',
        producto: ''
   
     
        }
    })
});




/* IMAGEEEEEEEEEEN*/

/*  function archivo(evt) {
      var files = evt.target.files; // FileList object
      //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
          var reader = new FileReader();
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
    }
 document.getElementById('idImag').addEventListener('change', archivo, false); */


//  function  subir_imagenes() {
//     var len = document.getElementById("idImag").files.length;
//     lista_img = new FormData();

//     for(i=0 ; i < len; i++){
//       img = document.getElementById('idImag').files[i];
//       if(!!img.type.match(/image.*/)){
//         if(window.FileReader){
//           img_leida = new FileReader();
//           img_leida.readAsDataURL(img);
//         }
//       lista_img.append('img_extra[]', img);
//       }
//     }

//     $.ajax({
//       url: "../control/controlProducto.php",
//       type: "POST",
//       data: lista_img,
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function(resp){

//       }
//     });
//   }

//   function handleFileSelect(evt) {
//       var files = evt.target.files;
//       for (var i = 0, f; f = files[i]; i++) {
//         if (!f.type.match('image.*')) {
//           continue;
//         }

//         var reader = new FileReader();
//         reader.onload = (function(theFile) {
//           return function(e) {
//             var span = document.createElement('span');
//             span.innerHTML = ['<img class="img_galeria" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
//             document.getElementById('list').insertBefore(span, null);
//           };
//         })(f);
//         reader.readAsDataURL(f);
//       }
//     }
//       document.getElementById('idImag').addEventListener('change', handleFileSelect, false);



