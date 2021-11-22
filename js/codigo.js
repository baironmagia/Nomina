$(document).ready(function(){

    $("#frmaddN").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "addNominaAJAX.php",
            type: "post",
            data: $("#frmaddN").serialize(),
            beforeSend: function(){
                $("#divNomina").html("<img src='imagen/ajax-loader.gif'>");
            },
            success: function(datos){
                $("#input-cedula").val("");
                $("#divNomina").html(datos);
            }
        });
    })
});