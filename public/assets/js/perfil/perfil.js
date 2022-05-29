/*Datatable*/
$(document).ready (function() {
    datatable();
});
function datatable(){
    $.ajax({
        url: "/perfil/rellenarTabla",
        success : function(data) {
            $('#example').dataTable( {
                data : data,
                columns: [
                        {"data" : "id"},
                        {"data" : "rut"},
                        {"data" : "nombre"},
                        {"data" : "apellidoPaterno"},
                        {"data" : "apellidoMaterno"},
                        {"data" : "telefono"},
                        {"data" : "comuna"}            
                ]
            });
        }       
    });
}
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});
/*Data*/
function data(){
    const data={
        rut:$('#rutTxt').val(),
        nombre:$('#nombreTxt').val(),
        apellidoPaterno:$('#apellidoPaternoTxt').val(),
        apellidoMaterno:$('#apellidoMaternoTxt').val(),
        telefono:$('#telefonoTxt').val(),
        comuna:$('#comunaSelect').val()
    };
    return data;
}
/*Crear*/
$( '#button' ).click(function() {
    crearPerfil();
    $('#example').DataTable().clear();
    $('#example').DataTable().destroy();
    datatable();
});
function crearPerfil(){
    $.ajax({
        data:  data(), //datos que se envian a traves de ajax
        url:   '/perfil/store', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultado").html(response);
        },
        error: function(request){
            let json=request.responseJSON;
            console.log(json);
            console.log(json['errors'].hasOwnProperty('rut'));
            if(json['errors'].hasOwnProperty('rut')){
                $("#errorRut").html(json['errors']['rut'][0]);
            }else{
                $("#errorRut").html("");
            }
        }
});
}
/*
$('#example').dataTable( {
    data : jsonObject,

    columns: [
              {"data" : "id"},
              {"data" : "rut"},
              {"data" : "nombre"},
              {"data" : "apellidoPaterno"},
              {"data" : "apellidoMaterno"},
              {"data" : "telefono"},
              {"data" : "comuna"}             
              ],

});
*/




/*$( '#button' ).click(function() {
    alert("test");

    $.ajax({
        // la URL para la petición
        url : 'perfil/test',
        // especifica si será una petición POST o GET
        type : 'GET',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            console.log(json);
        },
    
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            //let test = json.responseJSON;
            alert('Disculpe, existió un problema');
        },
    
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            alert('Petición realizada');
        }
    });
});*/