let preview = document.getElementById("preview");
var read_img = document.getElementById("file").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
        preview = document.getElementById('preview'),
        image = document.createElement('img');
        image.src = reader.result;
        image.style.height="100px";
        image.style.width="100px";
        image.className="remove_imagen";
        preview.innerHTML = '';
        preview.append(image);
    };
}

function eliminarProducto(id){
    var tipo_operacion ="eliminar";
    console.log(id);
    $.ajax({
        url: "../Controller/Controller-Producto.php",
        type: "post",
        data : {"id_producto":id,"tipo":tipo_operacion},
        success:function(get){
            if(get=="eliminado"){
                listar_Producto();
                toastr.success("Se eliminó el producto");
            }else{
                console.log("error");
            }
     
        }
    });
}

function verDatos(id){
    var tipo_operacion ='obtener_Datos';
    $.ajax({
        url: "../Controller/Controller-Producto.php",
        type:'post',
        data:{"id_producto":id,"tipo":tipo_operacion},
        success:function(data){
            var data = JSON.parse(data);
            $('#modal_id').val(data.idproducto);
            $('#modal_nombre').val(data.nombre);
            $('#modal_descripcion').val(data.descripcion);
            $('#modal_categoria').val(data.categoria);
            $('#modal_sub').val(data.nombre_sub);
            $('#modal_compra').val(data.precio_compra);
            $('#modal_venta').val(data.precio_venta);
            $('#modal_stock').val(data.stock);
            $('#modal_imagen').attr('src',data.url_imagen);
            $("#modal_producto_ver").modal('show');
          //  $("#GA").modal('show');
        }
    });
    
}

/*
var id =  $('#modal_id').val();
var nombre =  $('#modal_nombre').val();
var descripcion =   $('#modal_descripcion').val();
var categoria =   $('#modal_categoria').val();
var subcategoria =  $('#modal_sub').val();
var precio_compra = $('#modal_compra').val();
var precio_venta = $('#modal_venta').val();
var stock  = $('#modal_stock').val();
*/
function actualizar_Producto(){
    var imagen = document.getElementById('modal_src').files[0];
    var tipo_operacion ="actualizar_producto";
    form = new FormData();
    form.append("id",$('#modal_id').val());
    form.append("nombre",$('#modal_nombre').val());
    form.append("descripcion",$('#modal_descripcion').val());
    form.append("categoria",$('#modal_categoria').val());
    form.append("sub_categoria",$('#modal_sub').val());
    form.append("precio_compra",$('#modal_compra').val());
    form.append("precio_venta",$('#modal_venta').val());
    form.append("stock",$('#modal_stock').val());
    form.append("imagen",imagen);
    form.append("tipo",tipo_operacion);
    if(!imagen){
        var existe = "no_imagen";
        form.append("existe",existe);
    }else{  
        existe = "si_imagen";
        form.append("existe",existe);
    }
    console.log(existe);
     $.ajax({
        url: "../Controller/Controller-Producto.php",
        type: "post",
		data: form,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            console.log(data);
			if(data=="actualizado"){
                $("#modal_src").val("");
				$("#modal_producto_ver").modal('hide');
                listar_Producto();     
            }else {
				alert("error al actualizar");
			}
        }
    });     
}

function listar_ComboBox_Producto(){
    var ListarComboBox = "listarComboBox";
    $.ajax({
        url: "../Controller/Controller-Producto.php",
        type: "post",
        data: {"tipo":ListarComboBox},
        success: function(data){
			$("#categoria_producto").html(data);
        }
    });
}

function guardarProducto(){
    var frmData = new FormData();
    var imagen = document.getElementById('file').files[0];
    var tipo_operacion = "insertar_producto";
    frmData.append("tipo",tipo_operacion);
    frmData.append("categoria",$('#categoria_producto').val());
    frmData.append("nombre_producto",$('#nombre_producto').val());
    frmData.append("descripcion",$('#descripcion').val());
    frmData.append("imagen",imagen);
    frmData.append("precio_compra",$('#precio_compra').val());
    frmData.append("precio_venta",$('#precio_venta').val());
    frmData.append("stock",$('#stock').val());
    $.ajax({
        url: "../Controller/Controller-Producto.php",
        type: "post",
        data: frmData,
        contentType: false,
        cache: false,
        processData:false,
        success:function(e){
            if(e=="insertado"){
                toastr.success('Se agrego correctamente');
                limpiarText();
                listar_Producto();
            }else{
                console.log("error");
            }
        }
    });
}

function limpiarText(){
    document.getElementById("categoria_producto").value="";
    document.getElementById("stock").value="";
    document.getElementById("precio_compra").value="";
    document.getElementById("precio_venta").value="";
    document.getElementById("nombre_producto").value="";
    document.getElementById("descripcion").value="";
    $("#file").val("");
    preview.remove();
    //$('#remove_imagen').attr('src','');
    //document.getElementById("remove_imagen").remove(); 
}


function listar_Producto(){
    var tipo_operacion="listar_producto";
    $.ajax({
        url:"../Controller/Controller-Producto.php",
        type:'post',
        data:{"tipo":tipo_operacion},
        success:function(data){
            console.log(data);
            $("#listar_Producto").html(data);
        }
    });
}
/*
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
cargarCategoria(); 

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
function guardarProducto(){
    console.log("aea");
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
        /* subir_imagenes(); 
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
        /* document.getElementById("idVencimiento").value=fe; 
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
//       document.getElementById('idImag').addEventListener('change', handleFileSelect, false);*/



