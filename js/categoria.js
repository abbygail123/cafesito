function guardarCategoria(){
    var categoria =$('#iddCategoria').val();
    var insertar_categoria = "insertar";
    if(!categoria){
        toastr.error('Complete el campo');
    }else{
        $.ajax({
            url:'../Controller/Controller-Categoria.php',
            type:'post',
            data:{"categoria":categoria,"tipo":insertar_categoria},
            success: function(data){
                if(data == "registrado"){
                    listarCategoriaComboBox();
                    toastr.success('Se agrego correctamente');
                    document.getElementById("iddCategoria").value="";
                }else{
                    console.log("error");
                }
            }
        });
    }   
}
function listarCategoriaComboBox(){
    var listarCategoriaComboBox = "listarCategoriaComboBox";
    $.ajax({
        url: "../Controller/Controller-Categoria.php",
        type: "post",
        data: {"tipo":listarCategoriaComboBox},
        success: function(data){
			$("#categoria").html(data);
        }
    });
}
function listarCategoria_Sub(){
    var listar_Categoria_Sub = "listar_Categoria_Sub";
    $.ajax({
        url: "../Controller/Controller-Categoria.php",
        type: "post",
        data: {"tipo":listar_Categoria_Sub},
        success: function(data){
			$("#listaCategoria_Sub").html(data);
        }
    });
}

function guardarSub(){   
    var idcategoria=document.getElementById('categoria').value;
    var sub_categoria=document.getElementById('idSub').value;
    var tipo = "insertar_sub_categoria";
    if(!idcategoria || !sub_categoria){
        toastr.error('Complete todos los campos');
    }else{
        $.ajax({
            url:'../Controller/Controller-Categoria.php',
            type:'post',
            data:{"idcategoria":idcategoria,"sub_categoria":sub_categoria,"tipo":tipo},
            success:function(data){
                console.log(data);
                toastr.success('Se agrego correctamente');
                listarCategoriaComboBox();
                listarCategoria_Sub();
                document.getElementById('idSub').value="";
            }
        });
    }
}

function eliminar(id){
    var tipo = "eliminar";
    $.ajax({
        url:'../Controller/Controller-Categoria.php',
        type:'post',
        data:{"id":id,"tipo":tipo},
        success:function(data){
            console.log(data);
            if(data=="eliminado"){
                listarCategoria_Sub();
                listarCategoriaComboBox();
                toastr.success("Categoria eliminada");
            }else{
                toastr.error("Error al  eliminar");
            }
        }
    });
}


function verdatos(id){
    console.log("ver datos");
    var tipo_operacion = "obtener";
    $.ajax({
        url: "../Controller/Controller-Categoria.php",
        type: "post",
        data: { "idcategoria": id,"tipo":tipo_operacion},
        success: function(data){
			//console.log(data);
        	var datos = JSON.parse(data);
			$("#idcategoria").val(datos.idcategoria);
			$("#nombre_categoria").val(datos.categoria);
			$("#nombre_subcategoria").val(datos.nombre_sub); 
			$("#modal-categoria").modal('show');
        }
    });
}

function editarCategoria(){
    var id = $("#idcategoria").val();
	var nombre_categoria = $("#nombre_categoria").val();
	var sub_categoria = $("#nombre_subcategoria").val();
    var tipo_operacion = "editar";
    console.log(id);
    console.log(nombre_categoria);
    console.log(sub_categoria);
    $.ajax({
        url:'../Controller/Controller-Categoria.php',
        type:'post',
        data: {"idcategoria":id,"nombre_categoria":nombre_categoria,"sub_categoria":sub_categoria,"tipo":tipo_operacion},
        success:function(data){
            console.log(data);
            if(data =="actualizado"){
                listarCategoriaComboBox();
                listarCategoria_Sub();
                $("#modal-categoria").modal('hide');
                toastr.success("Categoria Actualizada");
            }else{
                toastr.erro("Error al actualizar");
            }
        }
    });
}