
function cancelarVenta(id){
    var tipo_operacion ="cancelarVenta";
    $.ajax({
        url: "../Controller/Controller-Venta.php",
        type: "post",
        data : {"idproducto":id,"tipo":tipo_operacion},
        success:function(get){
            console.log(get);
            if(get=="cancelado"){
                ListarProductoVender();
                listarProductoComboBox();
                listarOferta();
                toastr.success("Se cancelo la Venta");
            }else{
                console.log("error");
            }
        }
    });
}
function ListarProductoVender(){
    var  ListarProductoVender  = "ListarProductoVender";
    $.ajax({
        url:"../Controller/Controller-Venta.php",
        type:'post',
        data:{"tipo":ListarProductoVender},
        success:function(data){
            $("#ListarProductoVender").html(data);
        }
    });
}
function verDatosParaVender(id){
    var verDatosParaVender= "verDatosParaVender";
    $.ajax({
        url:"../Controller/Controller-Venta.php",
        type: "post",
        data: { "idproducto": id , "tipo":verDatosParaVender},
        success: function(data){
			console.log(data);
        	var datos = JSON.parse(data);
			$("#idproducto").val(datos.idproducto);
			$("#txtnombre").val(datos.nombre);
            $("#txtcantidad").val(datos.stock);
			$("#txtprecio").val(datos.precio_venta); 
            $("#txtventa").val(""); 
			$("#verDatosParaVender").modal('show');
        }
    });
}
function venderProducto(){
        var idproducto = $("#idproducto").val();
        var cantidad   = Number($("#txtcantidad").val());
        var venta      = Number($("#txtventa").val()); 
        var venderProducto = "venderProducto";
        if(venta>cantidad){
            toastr.error("Sobrepasa la cantidad en el stock");
        }else{ 
            $.ajax({
                url:"../Controller/Controller-Venta.php",
                type: "post",
                data: { "idproducto": idproducto,"tipo":venderProducto,"cantidadVenta":venta},
                success: function(data){
                    if(data=="venta"){
                        toastr.success("Producto En Venta");
                        ListarProductoVender();
                        $("#verDatosParaVender").modal('hide'); 
                        $("#txtventa").val(""); 
                        listarProductoComboBox();
                    }else{
                        toastr.error("Error al Vender El Producto");

                    }
                    
                }
            });
        }
}

/****************************************************************************************************/
function verOferta(id){
    var tipo = "obtenerProductoOferta";
    $.ajax({
        url:"../Controller/Controller-Oferta.php",
        type: "post",
        data: { "idproducto": id ,"tipo":tipo},
        success: function(response){
            const file = JSON.parse(response);
            file.forEach(file =>{
			$("#codigoProductoOferta").val(file.idproducto);
			$("#nombreProductoOferta").val(file.nombre);
			$("#precioProductoOferta").val(file.precio_venta); 
			$("#descuentoOferta").val(file.totalDescuento);
			$("#precioFinalOferta").val(file.precioFinal);
			$("#fechaFinalOferta").val(file.fechaDuracionOferta);
			$("#modelOfertaProducto ").modal('show');
        });
        }
    });
}

function CambiarDatosOferta(){
    var tipo_operacion ="CambiarDatosOferta";
    var idproducto = $("#codigoProductoOferta").val();
	var descuento = $("#descuentoOferta").val();
	var precioFinal=$("#precioFinalOferta").val();
	var fechaOferta =$("#fechaFinalOferta").val();
    $.ajax({
        url:"../Controller/Controller-Oferta.php",
        type:'post',
        data: {"tipo":tipo_operacion,"codigoProductoOferta": idproducto,"descuentoOferta":descuento,
        "precioFinalOferta":precioFinal,"fechaFinalOferta":fechaOferta},
        success:function(data){
            console.log(data);
            if(data=="actualizado"){
                listarOferta();
                $("#modelOfertaProducto ").modal('hide');
                 toastr.success("Se Actualizaron los datos");
            }else{
                toastr.success("Error");
            }
        }
    });
    //var nombreproducto = $("#nombreProductoOferta").val();
	//var precioproducto = $("#precioProductoOferta").val(); 
}

function listarOferta(){
    var listarOferta = "listarOferta";
    $.ajax({
        url:"../Controller/Controller-Oferta.php",
        type:'post',
        data:{"tipo":listarOferta},
        success:function(data){
            $("#listarOferta").html(data);
        }
    });
}

//DateTimePicker;
/*$(function () {
     $('#idTime').datetimepicker({
        locale: 'es',
        format: "DD/MM/YYYY H:mm",
        icons: {
            time: "far fa-clock",
            date: "far fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
     });
});*/
//Aplicar Descuento según el precio del producto;
function AplicarDescuento(){
    //actualizar el input descuento
    var precio_ini=document.getElementById("precioInicial").value;
    var descuento=document.getElementById("descuento").value;
    var descuen = (precio_ini*descuento)/100;
    var preT = precio_ini-descuen;
    preT = preT.toFixed(1)+"0";
    document.getElementById("precioFinal").value =preT;
    if ($('#descuento').val().length == 0) {
        document.getElementById("precioFinal").value ="";
    }
}

function ActualizarDescuento(){
    //actualiza los imput descuento modal
    var precioInicial=document.getElementById("precioProductoOferta").value;
    var descuento=document.getElementById("descuentoOferta").value;
    var descuen = (precioInicial*descuento)/100;
    var preT = precioInicial-descuen;
    preT = preT.toFixed(1)+"0";
    document.getElementById("precioFinalOferta").value =preT;
    if ($('#descuentoOferta').val().length == 0) {
        document.getElementById("precioFinalOferta").value ="";
    }
}

function eliminarOferta(id){
    var tipo_operacion ="eliminarOferta";
    $.ajax({
        url: "../Controller/Controller-Oferta.php",
        type: "post",
        data : {"idproducto":id,"tipo":tipo_operacion},
        success:function(get){
            console.log(get);
            if(get=="eliminado"){
                listarProductoComboBox();
                listarOferta();
                toastr.success("Se eliminó la Oferta");
                listarProductoComboBox
            }else{
                console.log("error");
            }
        }
    });
}

function listarProductoComboBox(){
    var listarProductoOferta = "listarProductoOferta";
    $.ajax({
        url: "../Controller/Controller-Oferta.php",
        type: "post",
        data: {"tipo":listarProductoOferta},
        success: function(data){
            console.log(data);
			$("#listarProductoOferta").html(data);
        }
    });
}
/**/ 
function SelectOptionProducto(){
    var tipo = document.getElementById('listarProductoOferta');
    var selected = tipo.options[tipo.selectedIndex].text;
    if(selected=="Seleccione"){
        limpiarTextField();
    }else{
        ObtenerPrecioProducto(selected);
    }
}

function ObtenerPrecioProducto(producto){
    var ObtenerPrecioProducto = "ObtenerPrecioProducto";
    form = new FormData();
    form.append("producto",producto);
    form.append("tipo",ObtenerPrecioProducto);
    $.ajax({
        url: "../Controller/Controller-Oferta.php",
        type: "post",
		data: form,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            var data = JSON.parse(data);
            $('#precioInicial').val(data.precio_venta);
            $('#idProducto').val(data.idproducto);
        }
    });     

}
/**/
function guardarOferta(){
    var fechaDuracion = $("#idfecha").val();
    var idProducto = $("#idProducto").val(); 
    var totalDescuento = $("#descuento").val();
    var precioFinal = $("#precioFinal").val();
    var precioInicial = $("#precioInicial").val();
    var tipo_operacion = "insertarOferta";
    if(totalDescuento=="" || fechaDuracion=="" || idProducto=="" || precioFinal=="" || precioFinal=="" || precioInicial==""){
        toastr.error("Completar todos los campos");
    }else{
    $.ajax({
        url: "../Controller/Controller-Oferta.php",
        type: "post",
        data:{"idProducto":idProducto,"precioInicial":precioInicial,"totalDescuento":totalDescuento,"precioFinal":precioFinal, "fechaDuracion":fechaDuracion,"tipo":tipo_operacion},
        success: function(data){
            console.log(data);
            if(data=="insertado"){
                limpiarTextField();
                listarProductoComboBox();
                listarOferta();
                toastr.success("Oferta guardada");
            }else{
                toastr.error("error");
            }

        }
    });
    }
}
function limpiarTextField(){
    document.getElementById("idfecha").value="";
    document.getElementById("idProducto").value="";
    document.getElementById("descuento").value="";
    document.getElementById("precioFinal").value="";
    document.getElementById("precioInicial").value="";
}