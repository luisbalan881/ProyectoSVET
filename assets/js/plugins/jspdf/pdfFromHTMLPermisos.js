function HTMLtoPDF1(solicitud){
	$.ajax({
    type: "POST",
    url: "rrhh_permisos/php/hoja_solicitudSalida.php",
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
		 doc.writeText(0, 45 ,'Control de Personal',{align:'center',width:211});
		 doc.setFontSize("12");
        

		
      
      
		 doc.setFontType("bold");
		 doc.text(25, 72, 'Nombre del Solicitante:');
		 doc.setTextColor(68, 68, 68);
		     doc.setFontType("normal");         
         doc.text(75, 72, data.autorizado2);
		  doc.setFontType("bold");
		 doc.text(25, 78, 'Cargo :');
		 
		  doc.setFontType("bold");
		  doc.text(25, 84, 'Motivo de solicitud :');
		  doc.setFontType("normal");
		  //doc.text(75,84, data.just);
		  	//doc.text(75, 90, p_lineas1);
          var p_lineas1 = doc.splitTextToSize(data.just, 127);
		  doc.text(75, 84, p_lineas1);
		 
		
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		       
         doc.text(75, 78, data.puesto);
		 
		 
		 doc.setFontType("bold");
		 doc.text(25, 104, 'Tiempo solicitado :');
      
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		           
         doc.text(100, 104, data.dias);
		 doc.setFontType("bold");
		 doc.text(25, 110, 'Tiempo en :');
      
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		 doc.text(100, 110, data.tipoTiempo);		 
		 doc.setFontType("bold");
		 doc.text(25, 116, 'De:');
      
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		           
         
		 doc.text(100, 116, data.hora1);
		 doc.setFontType("bold");
		 doc.text(25, 120, 'A :');
		 doc.setFontType("normal");
         doc.text(100, 120, data.hora2);
		 doc.setFontType("bold");
         doc.setFontType("normal");
         
		 doc.setFontType("bold");
		 doc.text(25, 130, 'Tipo de salida:');
      
         doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		 doc.text(100, 130, data.diaCompleto);
		//
		/*if (data.diaCompleto==1){
			
			doc.text(114, 130,'SI');
			
		}
		else
			{
			
			doc.text(114, 130,'NO');
			
		}*/
                

		 doc.setFontSize("12");
                 
                 
		/* doc.text(25, 84, 'De manera atenta me dirijo a usted para hacerle de su conocimiento que se le nombra, para');
		 doc.text(25, 88, 'que, en representación de la Secretaría contra la Violencia Sexual, Explotación y Trata de');
                 doc.text(25, 92, 'Personas -SVET- realice la actividad que se describe a continuación:                    ');*/
                // doc.text(25, 141, data.just);
                 //var p_lineas1 = doc.splitTextToSize(data.just, 170);

			//	doc.text(25, 103, p_lineas1);
               
                // doc.text(54, 122, data.lugar1);
				 doc.setFontType("bold");
         //        doc.text(25, 129, 'Fecha Inicio de Vacaciones :');
				 doc.setFontType("normal");
                 doc.text(100, 126, data.fecha);
				  
				   doc.setFontType("bold");
           //      doc.text(25, 135, 'Fecha en que termina vacaciones:');
				 doc.setFontType("normal");
                 //doc.text(100, 135, data.fecha2);
				  doc.setFontType("bold");
				  doc.text(25, 126, 'Fecha Solicitud :');
				   doc.setFontType("normal");
                 //doc.text(100, 141, data.fecha3);
             //    doc.text(25, 133, 'Así mismo, se le instruye que deberá cumplir con la ruta establecida y la misma no podrá');
		 //doc.text(25, 137, 'ser modificada sin autorización previa de su autoridad superior inmediata.');
                 //doc.text(25, 141, 'transporte estara a cargo del piloto y vehiculo asignado por la Dirección Administrativa.');
             //     doc.text(25, 141, 'Sin otro particular, me suscribo.');
                //   doc.writeText(0, 168 ,'Atentamente,',{align:'center',width:190});
			/*	 doc.text(25, 141, 'Justificacion :');
				 doc.text(25, 147, data.just);
                 var p_lineas1 = doc.splitTextToSize(data.just, 170);*/
				 doc.setFontType("bold");
				  doc.text(25, 147, 'Observaciones :');
				   doc.setFontType("normal");
				// doc.text(75, 147, data.obs);
                //var p_lineas1 = doc.splitTextToSize(data.obs, 170);
                     var p_lineas2 = doc.splitTextToSize(data.obs, 127);
						doc.text(75,  147, p_lineas2);
		 
		 

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

