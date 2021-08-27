// OFERTAAAAAAAAAAAAAAAAAAAAAAAA
function agregarPr(){
    
    //alert('getSelections: ' + JSON.stringify($('#idTabla').bootstrapTable('getSelections')))

    var datos = JSON.stringify($('#idTabla').bootstrapTable('getSelections'));
    var carrito=new Array();
    const myObj=JSON.parse(datos);
    var suma =0;
    $.each(myObj, function(i, item) {      
        suma=suma+parseInt( item[9]);
        $('#tablapro').bootstrapTable('insertRow', {

            index: 0,
            row: {
            cod: item[1],
            producto: item[2],
            precioI: item[9]

       
         
            }
        })
    });
    document.getElementById("idPrecio_inicial").value=suma;





    
                

}
    var $table = $('#tablapro')
    var $button = $('#button')
  

  $(function() {    
        $button.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.cod
        })
        $table.bootstrapTable('remove', {
            field: 'cod',
            values: ids
        })
        })
    })





$(function () {
 
     $('#idTime').datetimepicker({
        locale: 'es',
        format: "DD/MM/YYYY H:mm",
        
         /* defaultDate: "",
         disabledDates: [
             
             moment("25/12/2013"),
             new Date(2013, 11 - 1, 21),
             "22/11/2013 00:53"
         ] */
         icons: {
             time: "far fa-clock",
             date: "far fa-calendar",
             up: "fa fa-arrow-up",
             down: "fa fa-arrow-down"
         }
     });
     
    
 });
 function calcularDes(){
    var precio_ini=document.getElementById("idPrecio_inicial").value;
    var descu=document.getElementById("idDescuento").value;
    var descuen = (precio_ini*descu)/100;
    var preT = precio_ini-descuen;
    preT = preT.toFixed(1)+"0";
    document.getElementById("idPrecio_total").value =preT ;
}
function calcularDesg(){
    var precio_ini=document.getElementById("ini").value;
    var descu=document.getElementById("descu").value;
    var descuen = (precio_ini*descu)/100;
    var preT = precio_ini-descuen;
    preT = preT.toFixed(1)+"0";
    document.getElementById("pfinal").value =preT ;
}

function agregarOferta(){
    
    var datosS=JSON.stringify($("#tablapro").bootstrapTable('getData'));
    var valores=seleccionar(datosS);
        var preIn=document.getElementById("idPrecio_inicial").value;
        var descuento=document.getElementById("idDescuento").value;
        var precioT=document.getElementById("idPrecio_total").value;
        var tiempo=($('#idTime').datetimepicker('date')).format('YYYY-MM-DD HH:mm');
        var op="agregarOferta";
        $.ajax({
            type:"POST",
            url:"../control/controlOferta.php",
            data:{valores,preIn,descuento,precioT,tiempo,op},
            dataType:"json",//JavaScript Object Notation
            success: function(respuesta){		  
                if(respuesta.mensaje==true)
                {
                   toastr.success('Se agrego correctamente');
                   window.history.go();
                   $('#idmodaloferta-lg').modal('hide'); 
                }
                else
                {
                  alert(respuesta.mensaje);
                }
            }
        });	      
    
  
    
}
function seleccionar(datos)
{
    var carrito=new Array();
    const myObj=JSON.parse(datos);
    $.each(myObj, function(i, item) {      
           var obj_=item.cod+","+item.cant;
           carrito.push(obj_);
        
    });
    
    return carrito;
}
function clearOfer()
{
     
    document.getElementById("idPrecio_inicial").value="";
    document.getElementById("idDescuento").value="";
    document.getElementById("idPrecio_total").value="";
    document.getElementById("fecha").value=""; 
}


//


function guardarCliente()
{
    var val_=document.getElementById("buGuardar").value;
    if(val_==0)
    {

    }
    else{
        modificarOferta(val_);
    }
}

function modificarOferta(valo)
{
   // var precio_ini=document.getElementById("ini").value;
    var descu=document.getElementById("descu").value;
    var precioT=document.getElementById("pfinal").value;
    var fecha=document.getElementById("idTime").value;
    //var fecha=($('#idTime').datetimepicker('date')).format('YYYY-MM-DD HH:mm');
    
    var op="modificarOferta";
    calcularDesg();
    $.ajax({
        type:"POST",
        url:"../control/controlOferta.php",
        data:{descu,precioT,fecha,valo,op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se modifico correctamente');
               document.getElementById("idListaO").innerHTML=respuesta.tabla;  
               $("#idTablaO").bootstrapTable();
               clearOferg();
            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	      

}
function mostrarO(val_)
{
    var of=document.getElementById("of");
    of.style.display="block";
    cancelar=document.getElementById("cancelar");
    cancelar.style.display="block";
    $("table tbody tr").click(function() {
      
        document.getElementById("ini").value=$(this).find("td:eq(1)").text();
        //document.getElementById("idDescuento").value=$(this).find("td:eq(2)").text();
        var d=$(this).find("td:eq(2)").text();
        d=d.split(" ");
        d=d[0];
        console.log(d);
        document.getElementById("descu").value=d;
        document.getElementById("pfinal").value=$(this).find("td:eq(3)").text();
        document.getElementById("idfecha").value=$(this).find("td:eq(4)").text();
    
        document.getElementById("buGuardar").value=val_;
    });
}
function mensajeO(val)
{
  $('#idmodal').modal('show');
  document.getElementById("idFooter").innerHTML="<button type='button' class='btn btn-info' data-dismiss='modal'>Cancelar</button>"+
                                                "<button type='button' class='btn btn-danger' onclick='eliminarOferta("+val+")'>Eliminar</button>";
}
function eliminarOferta(id)
{
    var op="eliminarOferta";
    $.ajax({
        type:"POST",
        url:"../control/controlOferta.php",
        data:{"cod":id,"op":op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {
               toastr.success('Se elimino correctamente');
               document.getElementById("idListaO").innerHTML=respuesta.tabla;  
               $("#idTablaO").bootstrapTable(); 
               $('#idmodal').modal('hide'); 

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  

}

function prodd(prod){
    /* var op="prodd";
    $.ajax({
        type:"POST",
        url:"../control/controlOferta.php",
        data:{prod,op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje==true)
            {

            }
            else
            {
              alert(respuesta.mensaje);
            }
        }
    });	  */
    $("table tbody tr").click(function() {
        var codO=$(this).find("td:eq(0)").text();
        document.getElementById("codO").value=codO;
        document.getElementById("prei").value=$(this).find("td:eq(1)").text();
        var descO=$(this).find("td:eq(2)").text();
        descO=descO.split(" ");
        descO=descO[0];
        document.getElementById("descO").value=descO;
        document.getElementById("prefO").value=$(this).find("td:eq(3)").text();
        document.getElementById("venO").value=$(this).find("td:eq(4)").text();
        
    }); 
   

}
