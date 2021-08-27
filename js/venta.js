$(document).ready(function(){
    $(".Eliminar").click(function(evetn){
        evetn.preventDefault();
        var id= $(this).data('id');
        var boton= $(this);
        
        $.ajax({
            method:'POST',
            url:'../control/conVenta.php',
            data:{id:id}
        }).done(function(respuesta){
            alert(respuesta);
            boton.parent('td').parent('tr').remove();
            
        });

    })
    $(".Cantidad").keyup(function(){
        var cantidad= $(this).val();
        var precio=$(this).data('precio');
        var ids=$(this).data('id');
        var total= parseInt(cantidad)*parseFloat(precio);
        $(".cant"+ids).text("$"+total);

        $.ajax({
            method:'POST',
            url:'../control/conVenta.php',
            data:{ids:ids, cantidad:cantidad}
        }).done(function(respuesta){
            
        });
    })
})



function usuarios(codU) {
   
    //var codU=$_SESSION['id'];
 
    //alert(codU);
      var op="usuario"
    $.ajax({
        type:"POST",
        url:"../control/controlCliente.php",
        data:{codU,op},
        dataType:"json",//JavaScript Object Notation
        success: function(respuesta){		  
            if(respuesta.mensaje!=false)
            {
    
               document.getElementById("us").value=respuesta.mensaje[1];
               document.getElementById("nombrec").value=respuesta.mensaje[2];
               document.getElementById("telefono").value=respuesta.mensaje[3];
               document.getElementById("dni").value=respuesta.mensaje[4];
               document.getElementById("idDistrito").value=respuesta.mensaje[5];
            }else
            {
                toastr.error('El usuario no existe','ERROR');
            }
        }
    });	 
}


 