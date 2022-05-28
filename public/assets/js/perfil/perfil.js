$(document).ready (function() {
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
                ],
            });
        }       
    });
});
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


$( '#button' ).click(function() {
    console.log(data());
});
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