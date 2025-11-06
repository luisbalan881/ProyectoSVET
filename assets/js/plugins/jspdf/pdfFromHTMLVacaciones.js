function HTMLtoPDF_reporte(solicitud){
	$.ajax({
    type: "POST",
    url: "rrhh_permisos/php/hoja_solicitud.php",
    data: {solicitud:solicitud}, //f de fecha y u de estado.
  dataType:'json',


    beforeSend:function(){
                  //$('#response').html('<span class="text-info">Loading response...</span>');


          },
          success:function(data){


	var doc = new jsPDF();
	   doc.addImage(logo, 'png', 20, 15, 60, 15);  //  20, 15, ancho, 

            
            doc.setFontType("normal");
            doc.setTextColor(68, 68, 68);
          //  doc.writeText(0, 30 ,'NIT: '+data.nit,{align:'right' ,width:190});

		 doc.setFontType("bold");
		 doc.setTextColor(68, 68, 68);

	   //doc.text(33, 50, 'BOLETA DE SOLICITUD Y AUTORIZACIÓN DE VEH�?CULO PARA COMISIONES');
                  //   doc.writeText(0, 30 ,'NIT'+data.nit,{align:'right',width:190});
                    doc.writeText(0, 50 ,'No solicitud -- '+data.correlativo,{align:'right',width:190});
                 //doc.setFontType("bold");
		 //doc.text(94, 59, data.fecha); //append email id in pdf
                 doc.writeText(0, 55 ,'Guatemala, '+data.fecha1,{align:'right',width:190});


		 doc.setFontSize(12.5);
		 doc.writeText(0, 45 ,'SOLICITUD DE VACACIONES',{align:'center',width:211});
		 doc.setFontSize("12");
        

		
      
      
		 doc.setFontType("bold");
		 doc.text(25, 72, 'Nombre del Solicitante:');
		 doc.setTextColor(68, 68, 68);
		     doc.setFontType("normal");         
         doc.text(75, 72, data.autorizado2);
		  doc.setFontType("bold");
		 doc.text(25, 78, 'Cargo :');
		
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		           
         doc.text(75, 78, data.puesto);
		  doc.setFontType("bold");
		 doc.text(25, 96, 'Dias Solicitados :');
      
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);          
         doc.text(100, 96, data.dias);
		 
		 
		  doc.setFontType("bold");
		  doc.text(25, 100, 'Dias gozados con anterioridad :');
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);       
         doc.text(100, 100, data.dias_pendientes);  //
		 
		 doc.setFontType("bold");
		 doc.text(25, 104, 'Numero de dias Pendientes al 31/12:');
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);          
         doc.text(100, 104, data.diasConsumidos);
		 
		// doc.text(25, 104, 'Dias gozados con anterioridad :');
      
         //doc.setFontType("normal");
		 //doc.setTextColor(68, 68, 68);
		           
         //doc.text(85, 104, data.diasConsumidos);
	//	 var dos =  (data.diasConsumidos);
		// var tres= (data.dias);
		// var cuatro= dos+tres;
		 
		//  var cuatro =parseFloat(dos)+parseFloat(tres);  
		 
		 
		 
		 
		 
		 
		// doc.text(100, 100, cuatro);
		 
		  doc.setFontType("bold");
		  doc.text(25, 109, 'Fecha Inicio de periodo :');
		  doc.setFontType("normal");
                 doc.text(100, 109, data.fecha3);
				 doc.setFontType("bold");
                 doc.text(25, 115, 'Fecha Final periodo:');
				 doc.setFontType("normal");
                 doc.text(100, 115, data.fecha4);
                

		 doc.setFontSize("12");
                 
                 
		/* doc.text(25, 84, 'De manera atenta me dirijo a usted para hacerle de su conocimiento que se le nombra, para');
		 doc.text(25, 88, 'que, en representación de la Secretaría contra la Violencia Sexual, Explotación y Trata de');
                 doc.text(25, 92, 'Personas -SVET- realice la actividad que se describe a continuación:                    ');*/
                // doc.text(25, 141, data.just);
                 //var p_lineas1 = doc.splitTextToSize(data.just, 170);

			//	doc.text(25, 103, p_lineas1);
               
                // doc.text(54, 122, data.lugar1);
				 doc.setFontType("bold");
                 doc.text(25, 129, 'Fecha Inicio de Vacaciones :');
				 doc.setFontType("normal");
                 doc.text(100, 129, data.fecha);
				  
				   doc.setFontType("bold");
                 doc.text(25, 135, 'Fecha en que termina vacaciones:');
				 doc.setFontType("normal");
                 doc.text(100, 135, data.fecha2);
				  doc.setFontType("bold");
				  doc.text(25, 141, 'Fecha Reanudacion de Labores:');
				   doc.setFontType("normal");
                 doc.text(100, 141, data.fecha33);
             //    doc.text(25, 133, 'Así mismo, se le instruye que deberá cumplir con la ruta establecida y la misma no podrá');
		 //doc.text(25, 137, 'ser modificada sin autorización previa de su autoridad superior inmediata.');
                 //doc.text(25, 141, 'transporte estara a cargo del piloto y vehiculo asignado por la Dirección Administrativa.');
             //     doc.text(25, 141, 'Sin otro particular, me suscribo.');
                //   doc.writeText(0, 168 ,'Atentamente,',{align:'center',width:190});
			/*	 doc.text(25, 141, 'Justificacion :');
				 doc.text(25, 147, data.just);
                 var p_lineas1 = doc.splitTextToSize(data.just, 170);*/
				 doc.setFontType("bold");
				 
				 
				  doc.text(25, 147, 'Justificacion :');
				   doc.setFontType("normal");
				   var p_lineas1 = doc.splitTextToSize(data.just, 100);

		 doc.text(100, 147, p_lineas1);
				  
				  // doc.setFontType("normal");
				// doc.text(100, 147, data.just);
                 var p_lineas1 = doc.splitTextToSize(data.just, 170);

		 

		// doc.setFontType("normal");
		// doc.setTextColor(68, 68, 68);
		// doc.text(55, 80,  data.correlativo);
		// doc.text(55, 86, data.autorizado);
		 //doc.text(55, 87, data.departamentos); //append email id in pdf
		// var p_lineas1 = doc.splitTextToSize(data.departamentos, 115);

		// doc.text(55, 92, p_lineas1);
		 //doc.text(55, 98, data.solicitante);
		 
		 doc.writeText(10, 181, '_________________________________',{align:'center',width:190});
         doc.writeText(10, 187, 'Solicitante',{align:'center',width:190});
		 
		 
		  doc.writeText(10, 211, '_________________________________',{align:'center',width:190});
         doc.writeText(10, 217, 'Jefe Inmediato',{align:'center',width:190});
		 doc.setFontSize("8");


		 doc.writeText(0, 10 ,'Fecha y hora en la que se creó la solicitud: '+data.fecha_creacion,{align:'right',width:190});


		 

		 doc.setDrawColor(98, 98,98);

		 doc.setFontType("normal");
		 var p1=140;
		 var titulo= "";


     doc.setTextColor(68, 68, 68);
     doc.setFontSize("10");
     doc.setFontType("bold");

    // doc.text(25, 130, 'Justificación de la Solicitud: ');
		 doc.setFontSize(10);
     doc.setFontType("normal");
		 var p_lineas = doc.splitTextToSize(titulo, 155);
     doc.setTextColor(68, 68, 68);




     var string = titulo.replace(/f7/g,'\n\n');

     var lMargin=25; //left margin in mm
    var rMargin=25; //right margin in mm
    var pdfInMM=210;  // width of A4 in mm
		 var lines =doc.splitTextToSize(string, (pdfInMM-lMargin-rMargin));
     doc.text(lMargin,p1,lines);




		 doc.setFontSize(10);











		 

		 
		 doc.setFontSize("10");
		 doc.setFontType("normal");
		 doc.writeText(10, 235, '4ta calle 5-51 Zona 1, Guatemala' ,{align:'center',width:190});
		 doc.writeText(10, 240, 'Telefonos:(502)2504-8888' ,{align:'center',width:190});



		doc.setFontSize("10");

		 doc.setFontType("bold");
		




	   doc.setTextColor(255, 0, 0); //set font color to red
	  
		 doc.setFontSize(8);
		 doc.setTextColor(5, 83, 142);
		// doc.writeText(0, 258 ,'Reporte Generado svetsis - Módulo control de viaticos',{align:'center',width:215});
		 //doc.addImage(footer, 'png', 0, 260, 216, 15);
	   doc.save('Solicitud - '+ data.correlativo +'.pdf'); // Save the PDF with name "katara"...

	 }


}).done( function(data) {
}).fail( function( jqXHR, textSttus, errorThrown){

alert(errorThrown);

});
}

