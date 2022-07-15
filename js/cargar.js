/* global fetch, ruta_archivo, extension_archivo */

﻿$(document).ready(function(){

    
    SelecionarCampos();
 
    $('.enviar_archivo').on("click", function (event) {
        event.preventDefault();
        cargarArchivocsv();
    });
});

// Esta funcion permite visualizar los campos en la etiquetas Select
function SelecionarCampos(){
    $.ajax({
        url:"ajax/consultar-valores.php",
        success: function(datos){
            $('#cabecera').html(datos);
        }
    });
}

// Pasa la variable de validacion generando un hidden como token
function pasarVariable(){
    
    var variableActa = $('#variableActa').val();
    
    $.ajax({
        url:"index.php",
        success: function(){
            var variable = '<input type="hidden" name="varActs" id="varActs" value="' + variableActa + '">';
            $('#hid').html(variable);
        }
    });
}

// Genera la imformacion de la acta con uso de un token
function Acta(){
    
    var variableActa = $('#variableActa').val();
    
    
    if(variableActa === '0'){
        
        $.ajax({
                type: "POST",
                
                url: "ajax/generar-actas.php",

                success: function (datos) {
                    $('#tabla_Datos').html(datos);
                }
            });
        
    }else{
        if (variableActa === "1") {

            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/generar-actas.php",

                success: function (datos) {
                    $('#tabla_Datos').html(datos);
                    var v1 = document.getElementById("VarAct");
                    v1.value = "1";


                }
            });

        } else if (variableActa === "2") {
            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/generar-actas.php",

                success: function (datos) {
                    $('#tabla_Datos').html(datos);
                    var v2 = document.getElementById("VarAct");
                    v2.value = "2";


                }
            });
        } else if (variableActa === "3") {
            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/generar-actas.php",

                success: function (datos) {
                    $('#tabla_Datos').html(datos);
                    var v3 = document.getElementById("VarAct");
                    v3.value = "3";


                }
            });
        }        
    }
    
    
}

// Envia los datos selecionados en el campo cabecera para luego generar el acta
function Generar_Acta(){
    
    var selectPL = $('#selectPL').val();
    var selecCA =  $('#selectCA').val();
    var selectJN = $('#selectJN').val();
    var selectPA = $('#selectPA').val();
    var selectPr = $('#selectPr').val();
    var selectAS = $('#selectAS').val();
    var selectPc = $('#selectPc').val();
    var selectDc = $('#selectDc').val();
    
    
    $.ajax({
        type: "POST",
        data:{
            select_PL: selectPL,
            selec_CA: selecCA,
            select_JN: selectJN,
            select_PA: selectPA,
            select_Pr: selectPr,
            select_AS: selectAS,
            select_Pc: selectPc,
            select_Dc: selectDc
        },
        url:"ajax/variable_tb_calificaciones.php",
        success: function(datos){
            
            $('#hid').html(datos);
            Acta();
            
        }
    });
    
    
}

function Limpiar(){
    const form = document.getElementById("frmSubircsv");
    
    //settimeout('document.form.reset()', 2000);
}

// carga los archivos csv del formulario para ingresar o actualizar los datos
function cargarArchivocsv(){
    
        

	var archivo 		  = $('#archivo_csv').val().split('\\').pop();
	var extension		  = $('#archivo_csv').val().split(".").pop().toLowerCase();

        var formData = new FormData(document.getElementById("frmSubircsv"));
       
	var retornarError     = false;
        
        // valida si el input: file esta vacío
	if(archivo === "")
	{
		$('#label').addClass('btn-outline-danger');
                $('#envio').addClass('btn-danger');
               
		retornarError = true;
                
	} 
	else if($.inArray(extension, ['csv']) === -1)
	{
		alert("¡El archivo que esta tratando de subir es invalido!");
		retornarError = true;
		$('#archivo_csv').val("");
	}
	else
	{
		$('#archivo_csv').removeClass('btn-outline-danger');
	}

    // A continuacion se resalta todos los campos que contengan errores.
    if(retornarError === true)
    {
        return false;
    }

    // envío de datos del formulario por fetch
    fetch('reportes/procesar.php', 
    {
       method: 'POST',
       body: formData
    }).then(function(response)
    {
         if(response.ok)
         {
             return response.text();
             
         }else
         {
             throw "Error en la llamada ajax";
         }
    } ).then(function(datos)
    {
         $('#mensaje').html(datos);    
//         document.getElementById('archivo_csv').value="";
//         var i = document.getElementById('archivo_csv').value;
//         console.log("si esta vacio" +i);
            
            setInterval("location.reload()",1000);
                     
    });

    
}

//Reinicia el acta al su estado original (calificaciones = 0)
function EliminarActa(){
    
    var variableActa = $('#variableActa').val();
    
    if(variableActa === '0'){
        
        $.ajax({
                type: "POST",
                
                url: "ajax/eliminar-act.php",

                success: function () {
                   alert("Error...");
                }
            });
        
    }else{
        if (variableActa === "1") {
            
            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/eliminar-act.php",
                success: function (datos) {
                    $('#mensaje').html(datos).fadeOut(9000);
                    
                    Generar_Acta();
                    
                }
            });

        } else if (variableActa === "2") {
            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/eliminar-act.php",
                success: function (datos) {
                    $('#mensaje').html(datos);  
                    Generar_Acta();
                    
                }
            });
            
        } else if (variableActa === "3") {
            $.ajax({
                type: "POST",
                data: {varAct: variableActa},
                url: "ajax/eliminar-act.php",
                
                success: function (datos) {
                    $('#mensaje').html(datos);
                    Generar_Acta();
                    
                }
            });
            
        }        
    }
    
}

// asigna el nombre del archivo que se subió en el botn importar

 jQuery('input[type=file]').change(function(){
   
   var filename = jQuery(this).val().split('\\').pop();
   var idname = jQuery(this).attr('id');
   console.log(jQuery(this));
   console.log(filename);
   console.log(idname);
   jQuery('span.'+idname).next().find('span').html(filename);
});







// Genera el respectivo reporte
function pasarReporte(){
    
    var selectPL = document.getElementById("selectPL");
    var selecCA =  document.getElementById("selectCA");
    var selectJN = document.getElementById("selectJN");
    var selectPA = document.getElementById("selectPA");
    var selectPr = document.getElementById("selectPr");
    var selectAS = document.getElementById("selectAS");
    var selectPc = document.getElementById("selectPc");
    var selectDc = document.getElementById("selectDc");
    
    var variableActa = $('#variableActa').val();
    
    // validad el numero del token para generar la imfomacion correcta
    if(variableActa === "1"){
        var v1 = document.getElementById("VarAct");
//      v1.value = "1";

        window.open("/proyecto-web/reportes/reporte.php?id="+v1.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
        
    }else if(variableActa === "2" ){
        
        var v2 = document.getElementById("VarAct");
        //v2.value = "2";
        window.open("/proyecto-web/reportes/reporte.php?id="+v2.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
        
    } else if(variableActa === "3"){
      
        
        var v3 = document.getElementById("VarAct");
        v3.value = "3";
        window.open("/proyecto-web/reportes/reporte.php?id="+v3.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
    }
}

function Generar_Grafica(){
    
    //Variables de los campos select
    var selectPL = document.getElementById("selectPL");
    var selecCA =  document.getElementById("selectCA");
    var selectJN = document.getElementById("selectJN");
    var selectPA = document.getElementById("selectPA");
    var selectPr = document.getElementById("selectPr");
    var selectAS = document.getElementById("selectAS");
    var selectPc = document.getElementById("selectPc");
    var selectDc = document.getElementById("selectDc");
    
    var variableActa = $('#variableActa').val();
    
    // validad el numero del token para generar la imfomacion correcta
    if(variableActa === '0'){
        
        $.ajax({
                type: "POST",
                
                url: "../reportes/grafica.php",

                success: function () {
                    alert('Error... Seleciones los campos correctos');
                  
                }
            });
        
    }else
    if(variableActa === "1"){

        var v1 = document.getElementById("VarAct");
        //v1.value = "1";
        window.open("/proyecto-web/reportes/grafica.php?id="+v1.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
        
    }else if(variableActa === "2" ){
        
        var v2 = document.getElementById("VarAct");
      //v2.value = "2";
        window.open("/proyecto-web/reportes/grafica.php?id="+v2.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
    } else if(variableActa === "3"){
      
        
        var v3 = document.getElementById("VarAct");
      //v3.value = "3";
        window.open("/proyecto-web/reportes/grafica.php?id="+v3.value+"&Pl="+selectPL.value+"&Ca="+selecCA.value+"&Jn="
                    +selectJN.value+"&Pa="+selectPA.value+"&Pr="+selectPr.value+"&As="+selectAS.value+"&Pc="+selectPc.value+"&Dc="+selectDc.value);
        
    }
    
    
}


//$(document).ready(function(){
//
//	$('.enviar_archivo').on( "click", function(evt){
//
//		evt.preventDefault();
//		cargarArchivoxlsx();
//	});
//});
//
//function cargarArchivoxlsx(){
//
//	var archivo 		  = $('input[name=archivo_xlsx]').val();
//	var extension		  = $('#archivo_xlsx').val().split(".").pop().toLowerCase();
//	var Formulario		  = document.getElementById('frmSubirxlsx');
//	var dataForm		  = new FormData(Formulario);
//
//	var retornarError     = false;
//
//	if(archivo=="")
//	{
//		$('#archivo_xlsx').addClass('error');
//		retornarError = true;
//		$('#archivo_xlsx').focus();
//	} 
//	else if($.inArray(extension, ['xlsx']) == -1)
//	{
//		alert("¡El archivo que esta tratando de subir es invalido!");
//		retornarError = true;
//		$('#archivo_xlsx').val("");
//	}
//	else
//	{
//		$('#archivo_xlsx').removeClass('error');
//	}
//
//    // A continuacion se resalta todos los campos que contengan errores.
//    if(retornarError == true)
//    {
//        return false;
//    }
//    document.getElementById('frmSubirxlsx').action="procesar.php";
//    document.getElementById('frmSubirxlsx').submit();
//}