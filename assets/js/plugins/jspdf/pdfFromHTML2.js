                  function HTMLtoPDFV(solicitud){
	$.ajax({
    type: "POST",
    url: "viaticos/php/hoja_solicitud2.php",
    data: {solicitud:solicitud}, //f de fecha y u de estado.
  dataType:'json',


    beforeSend:function(){
                  //$('#response').html('<span class="text-info">Loading response...</span>');


          },
          success:function(data){


	var doc = new jsPDF();
	   doc.addImage(logo, 'jpeg', 20, 15, 60, 35);

		 doc.setFontType("bold");
		 doc.setTextColor(68, 68, 68);

		 doc.setFontSize(12.5);
		 doc.writeText(0, 61 ,'SOLICITUD DE VIATICOS',{align:'center',width:211});
		 doc.setFontSize("11");
                 doc.text(25, 71, 'A Señor (a) Dirección Financiera');
		 doc.setFontSize("10");
		 doc.text(25, 80, 'Nombramiento :');
		 doc.text(25, 86, 'Autorizado :');

		 doc.text(25, 92, 'Dep.(s) :');
		 doc.text(25, 98, 'Solicitante :');
                  doc.text(25, 104, 'Lugar(s) :');

		 doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		 doc.text(55, 80,  data.correlativo);  
                 doc.text(55, 86, data.autorizado);
                
		 var p_lineas1 = doc.splitTextToSize(data.departamentos, 115);

		 doc.text(55, 92, p_lineas1);
		 doc.text(55, 98, data.autorizado2);
                 doc.text(55, 104, data.lugar1);
                 


		 doc.setFontSize("8");


		 doc.writeText(0, 10 ,'Fecha y hora en la que se creó la solicitud: '+data.fecha_creacion,{align:'right',width:190});


		 doc.setDrawColor(0, 136, 176);
		 doc.setFillColor(0, 136, 176);
		 doc.roundedRect(25, 105, 165, 8, 1, 1,'FD');
		
		 doc.setTextColor(255, 255, 255);
		 doc.setFontType("normal");
		 doc.setFontSize("10");


		 doc.text(30, 110, 'Fecha Inicio :');
		 doc.text(72, 110, 'Fecha Fin :');
		 doc.text(119, 110, 'No. Dias :');
		 doc.text(159, 110, 'Monto :');  // motos tolat


		 doc.setFontType("bold");
		 doc.text(51, 110, data.fecha); //append email id in pdf
		 doc.text(90, 110, data.fecha2);
		 doc.text(136, 110, data.Totalsolicitado);
		 doc.text(174, 110, data.TotalRecibido);
                doc.setTextColor(68, 68, 68);
		doc.setFontSize("8");
		doc.setFontType("normal");
		

	 doc.setFontType("bold");
    	 doc.text(25, 118, 'Objetivo de la comisión : ');
	 doc.text(25, 132, 'Descripción de lo solicitado: ');
	
       var p1=140;
		 var titulo= data.destino; 
  
      
		 doc.setFontSize(6);
     doc.setFontType("normal");
		 var p_lineas = doc.splitTextToSize(titulo, 155);
   
     var string = titulo.replace(/f7/g,'\n\n');

     var lMargin=25; //left margin in mm
    var rMargin=25; //right margin in mm
    var pdfInMM=210;  // width of A4 in mm
		 var lines =doc.splitTextToSize(string, (pdfInMM-lMargin-rMargin));
     doc.text(lMargin,p1,lines);



		 doc.setFontSize(8);


		 doc.setTextColor(68, 68, 68);	
		// doc.setTextColor(255, 255, 255);
		 doc.setFontType("normal");
		 var p_lineas2 = doc.splitTextToSize(data.obj, 167);
		 doc.text(25, 122, p_lineas2);

		 var p_lineas3 = doc.splitTextToSize(data.motivo, 145);
		 doc.text(45, 137, p_lineas3);
		 doc.setTextColor(68, 68, 68);



		  doc.setFontType("normal");

		 doc.setFontSize("8");
		 doc.setFontType("bold");
		
		 doc.setFontSize("7");
		 doc.setFontType("normal");
		
		doc.setFontSize("10");

		 doc.setFontType("bold");
		

	   doc.setTextColor(255, 0, 0); //set font color to red
	   
		 doc.setFontSize(8);
		 doc.setTextColor(5, 83, 142);
		 doc.writeText(0, 258 ,'Reporte Generado por Sistema Control Administrativo SVET - Módulo control de viaticos',{align:'center',width:215});
		 //doc.addImage(footer, 'png', 0, 260, 216, 15);
	   doc.save('Solicitud - '+ data.correlativo +'.pdf'); // Save the PDF with name "katara"...

	 }


}).done( function(data) {
}).fail( function( jqXHR, textSttus, errorThrown){

alert(errorThrown);

});
}


