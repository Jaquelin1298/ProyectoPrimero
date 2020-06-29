jQuery(document).ready(function($) {
	ListarEmpleado();
});

$(function(){
    $('#registrarempleado').on('click', function (e){
        e.preventDefault();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('nlista', $('#numlist').prop('value'));
        paqueteDeDatos.append('nombre', $('#nombre').prop('value'));
        paqueteDeDatos.append('fnacimiento', $('#fnacimiento').prop('value'));
        paqueteDeDatos.append('sexo', $('#sexo').prop('value'));
        paqueteDeDatos.append('telefono', $('#telefono').prop('value'));
        paqueteDeDatos.append('fingreso', $('#fingreso').prop('value'));
        paqueteDeDatos.append('correo', $('#correo').prop('value'));
        paqueteDeDatos.append('sueldo', $('#sueldo').prop('value'));
        paqueteDeDatos.append('departamento', $('#departamento').prop('value'));
        paqueteDeDatos.append('puesto', $('#puesto').prop('value'));
        paqueteDeDatos.append('contrato', $('#contrato').prop('value'));
        paqueteDeDatos.append('jefe', $('#jefe').prop('value'));
        paqueteDeDatos.append('fimss', $('#fimss').prop('value'));
        paqueteDeDatos.append('sueldoImss', $('#sueldoImss').prop('value'));
        paqueteDeDatos.append('numeroimss', $('#numeroimss').prop('value'));
        paqueteDeDatos.append('direccion', $('#direccion').prop('value'));
        ;
       
        $.ajax({
            url: '../controlador/rhempleadoscontroller.php?empleado=RegistrarEmpleado',
            type: 'POST', 
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 
            success: function(response){ 
                if(response == "success"){
                    alert("Registro Guardado");
                       
                        setTimeout(refrescar, 1300);  
  
                }else if(response == "requerid"){
                    alert("Datos Requeridos");
                }else if(response == "failed"){
                    alert("Algo Salio Mal");
                }
            },
            error: function (){ 
                alert("Algo ha fallado.");
            }
        });
    });
});

function ListarOperario(){
	$('#operario').DataTable({
        "destroy":true,
        "responsive":true,
        "prosessing":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax":{
            "method":"POST",
            "url":"../controlador/rhempleadoscontroller.php?empleado=ListarEmpleado",
        },
         "columns":[
            {"data":"nlista"},
            {"data":"nombre"},
            {"data":"fnacimiento"},
            {"data":"sexo"},
            {"data":"telefono"},
            {"data":"fingreso"},
            {"data":"correo"},
            {"data":"sueldo"},
            {"data":"departamento"},
            {"data":"puesto"},
            {"data":"contrato"},
            {"data":"jefe"},
            {"data":"fimss"},
            {"data":"sueldoImss"},
            {"data":"numeroimss"},
            {"data":"direccion",render:function(data,type,row){
                   }
                } 
            ],
        
    });
}

function refrescar(){
    //Actualiza la página
    location.reload();
}