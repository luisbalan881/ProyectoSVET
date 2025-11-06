                  function HTMLtoPDFV1(solicitud){
	$.ajax({
    type: "POST",
    url: "viaticos/php/hoja_solicitud2.php",
    data: {solicitud:solicitud}, //f de fecha y u de estado.
  dataType:'json',

//destino
    beforeSend:function(){
                 

          },
          success:function(data){


	var doc = new jsPDF();
        
        var logo1 = new Image();
        logo1.src = 'assets/img/constancia.jpeg';
	   doc.addImage(logo1, 'jpeg', 5, 0, 205, 270);

		 doc.setFontType("bold");
		 doc.setTextColor(68, 68, 68);

	  
		 doc.setFontSize(12.5);

		 doc.setFontSize("10");

		 doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
		 doc.text(30, 48, data.autorizado2);
                 doc.text(30, 58, data.puesto);
                 doc.text(170, 28, data.id1);

		 doc.setFontSize("8");

		 doc.setTextColor(255, 255, 255);
		 doc.setFontType("normal");
		 doc.setFontSize("10");

		 doc.setFontType("bold");
		
                

		 doc.setDrawColor(98, 98,98);

		 doc.setFontType("normal");
		 var p1=140;
		 var titulo= "";


     doc.setTextColor(68, 68, 68);
     doc.setFontSize("9");
     doc.setFontType("bold");
   
      doc.setFontSize("7");
     doc.setFontType("normal");
   
      
		 doc.setFontSize(8);
     doc.setFontType("normal");
		 var p_lineas = doc.splitTextToSize(titulo, 155);
     doc.setTextColor(68, 68, 68);



//destino
     var string = titulo.replace(/f7/g,'\n\n');

     var lMargin=25; //left margin in mm
    var rMargin=25; //right margin in mm
    var pdfInMM=210;  // width of A4 in mm
		 var lines =doc.splitTextToSize(string, (pdfInMM-lMargin-rMargin));
     doc.text(lMargin,p1,lines);


		 doc.setFontSize(8);
		 doc.setTextColor(255, 255, 255);
		 doc.setFontType("bold");
	
		 doc.setTextColor(68, 68, 68);



		  doc.setFontType("normal");


		 doc.setFontSize("8");
		 doc.setFontType("normal");
		



 var c1=data.id1;
		 if(c1<=1000){

		// doc.line(36, 210, 100, 210);
		doc.text(8, 256, 'Forma autorizada según Resolución  de la Contraloría General de Cuentas No. MP./002738 número de Gestión 390881 de fecha 09-08-2019');
		doc.text(8, 259, 'correlativo 781-2019 de fecha 26-08-2019 Enváo Fiscal 4-ASCC 16758 de fecha 26-08-2019. del 001 a 1000. Secretaría contra la Violencia');
        doc.text(25, 262, 'Sexual, Explotación y Trata de Personas, NIT 7463923-4, Libro 4-ASCC Folio 115, Cuentadancia S1-38.');
		doc.text(5, 265, '__________________________________________________________________________________________________________________________________');
		doc.text(80, 268, ' Original--Expediente-Duplicado--Contabilidad');
			
		}
		
		else {
			doc.text(5, 256, 'Forma autorizada según Resolución de la Contraloría General de Cuentas No. F.O.-LM-257-2023 003748 número de Gestión 864770 de fecha 14-09-2023');
		doc.text(5, 259, 'correlativo 869-2023 de fecha 02-11-2023 Enváo Fiscal 4-ASCC 21284 de fecha 02-11-2023, del 1001 al 2000. Secretaría contra la Violencia');
        doc.text(20, 262, 'Sexual, Explotación y Trata de Personas, NIT 7463923-4, Libro 4-ASCC Folio 132, Cuentadancia 2022-100-101-18-030');
		doc.text(5, 265, '___________________________________________________________________________________________________________________________________');
		doc.text(80, 268, ' Original--Expediente-Duplicado--Contabilidad');
			
		}


	   doc.setTextColor(255, 0, 0); //set font color to red
	
		 doc.setFontSize(8);
		 doc.setTextColor(5, 83, 142);
		 
	   doc.save('Solicitud - '+ data.correlativo +'.pdf'); // Save the PDF with name "katara"...

	 }


}).done( function(data) {
}).fail( function( jqXHR, textSttus, errorThrown){

alert(errorThrown);

});
}


