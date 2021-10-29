//DateTimePicker;
$(function () {
     $('#idTime').datetimepicker({
        locale: 'es',
        format: "DD/MM/YYYY H:mm",
     });
});

//Aplicar Descuento según el precio del producto;
function AplicarDescuento(){
    var precio_ini=document.getElementById("ini").value;
    var descu=document.getElementById("descu").value;
    var descuen = (precio_ini*descu)/100;
    var preT = precio_ini-descuen;
    preT = preT.toFixed(1)+"0";
    document.getElementById("pfinal").value =preT;
}

function listarProductoOferta(){
    var listarProductoOferta = "listarProductoOferta";
    $.ajax({
        url: "../Controller/Controller-Oferta.php",
        type: "post",
        data: {"tipo":listarProductoOferta},
        success: function(data){
			$("#listarProductoOferta").html(data);
            console.log(data);
        }
    });
}


function SelectOptionProducto(){
    var tipo = document.getElementById('listarProductoOferta');
    var selected = tipo.options[tipo.selectedIndex].text;
    if(selected=="Seleccione"){
        $('#precioInicial').val("");
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
            console.log(data);
            var data = JSON.parse(data);
            $('#precioInicial').val(data.precio_venta);
        }
    });     

}

