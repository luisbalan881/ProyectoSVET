                  function pdfLiquidacionAmpliacion(solicitud){
	$.ajax({
    type: "POST",
    url: "viaticos/php/hojaLiquidacionAmpliacion.php",
    data: {solicitud:solicitud}, //f de fecha y u de estado.
  dataType:'json',

//destino
    beforeSend:function(){
       
          },
          success:function(data){


	var doc = new jsPDF();
        
        var logo1 = new Image();
        logo1.src = 'assets/img/liquidacion.jpeg';
	   doc.addImage(logo1, 'jpeg', 9, 6, 200, 260);

		 doc.setFontType("bold");
		 doc.setTextColor(68, 68, 68);

		 doc.setFontSize(12.5);
		// doc.writeText(0, 65 ,'SOLICITUD DE VIATICOS 6',{align:'center',width:211});
		 doc.setFontSize("10");
                  doc.text(190, 25, data.id1);
                    doc.text(175, 30, data.Total);
                    
                    
                     doc.writeText(35, 47 ,'SECRETARIA CONTRA LA VIOLENCIA SEXUAL, EXPLOTACION Y TRATA DE PERSONAS.');
            var p_lineas2 = doc.splitTextToSize(data.obj, 58);

		 doc.text(12, 73, p_lineas2); 
		// doc.text(25, 80, 'Nombramiento :');
		 //doc.text(25, 86, 'Autorizado :');
                 
                  //doc.text(69, 79, data.lugar1);
                   var p_lineas5 = doc.splitTextToSize(data.lugar1, 30);

		 doc.text(69, 79, p_lineas5); 
                  
                  
                  
                  
                  
                   doc.text(104, 86, data.Total2);

		// doc.text(25, 92, 'Dep.(s) :');
		// doc.text(25, 98, 'Solicitante :');

		 doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
	
                doc.text(80, 215,  data.correlativo);
                doc.text(173, 79,  data.desa);
                doc.text(173, 85,  data.almu);
               
                doc.text(173, 91,  data.cena);
                doc.text(173, 97,  data.hosp);//tgas
                 doc.text(173, 106,  data.tgas);
                 doc.text(173, 120,  data.tgas);
                  doc.text(173, 146, data.Totalsolicitado);  //total solicitado normalmente sin ampliacion
			
				if (data.complemento>0){
				//var n1 = -1;
				
				//var b=a.toInteger(10);
				//var n2 = Math.abs(data.complemento);
				//var data2=data.complemento;
				//var data2* -1;
				var n1 = 22 ;
				
				//var n3 = n1;
				
				
				//var n3 = -1*n2;
				
				
				doc.writeText(175, 152 ,'00.00');
                   doc.text(173, 157, data.complemento); //complemento
				   
				   
				    }
					 else{
                    // doc.writeText(175, 157 ,'00.00');
					
					doc.text(173, 152, data.complemento);////
					
					doc.setTextColor(255,255,255);
					 doc.setFontType("bold");
					doc.text(170, 152 ,'==');
					//doc.text(173, 157,'00.00')
					 doc.setTextColor(68, 68, 68);
					doc.setFontType("normal");
					 // doc.writeText(173, 152,'Gt,'+data.complemento);
					
				doc.text(173, 157,'00.00');
				
				  }
                   doc.text(173, 166, data.tgas);  //destino2
            		  
				  
				  
				  
                   var a= data.Total;
                  var b=a.toString(10);
                  var res= NumeroALetras(b);
                  
                  doc.text(47, 53,res );
               
		 doc.text(31, 187, data.autorizado2);
                 doc.text(31, 192, data.puesto);
				  doc.writeText(161, 192 ,'NIT:');
                   doc.text(171, 192, data.nit);
                   doc.writeText(128, 192 ,'Q');
                   doc.text(131, 192, data.sueldo); //sueldo
                   doc.text(89, 198, data.partida); // partida presupuestaria
                  
                   doc.text(40, 220, data.autorizado);
                    doc.text(40, 225, data.puesto2);
                     doc.writeText(0, 231 ,'Guatemala,'+data.fechaf,{align:'center',width:190});
                // doc.text(35, 155, data.puesto);

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
    // doc.text(178, 115, data.personas);
    // doc.text(25, 123, 'Objetivo de la comisión : ');
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


		 doc.setFontSize(7);

		 doc.setTextColor(255, 255, 255);
		 doc.setFontType("bold");
	
		// doc.text(45, 137, p_lineas3);
		 doc.setTextColor(68, 68, 68);



		  var c1=data.id1;
		 if(c1<1001){

		// doc.line(36, 210, 100, 210);
		doc.text(20, 256, 'Forma autorizada según Resolución de la contraloría General de Cuentas No. MP./002738 número de Gestión 390881 de fecha 09-08-2019');
		doc.text(20, 259, 'correlativo 781-2019 de fecha 26-08-2019 Envío Fiscal 4-ASCC 16758 de fecha 26-08-2019. del 001 a 1000. Secretaría contra la Violencia');
        doc.text(40, 262, 'Sexual, Explotación y Trata de Personas, NIT 7463923-4, Libro 4-ASCC Folio 115, Cuentadancia S1-38.');
		doc.text(10, 265, ' ______________________________________________________________________________________________________________________________');
		doc.text(75, 268, ' Original--Expediente-Duplicado--Contabilidad');
		}
		
		else {
			doc.text(20, 256, 'Forma autorizada según Resolución de la Contraloría General de Cuentas No. F.O.-LM-257-2023 003748 número de Gestión 864770 de fecha 14-09-2023');
		doc.text(20, 259, 'correlativo 869-2023 de fecha 02-11-2023 Envío Fiscal 4-ASCC 21284 de fecha 02-11-2023, del 1001 al 2000. Secretaría contra la Violencia');
        doc.text(40, 262, 'Sexual, Explotación y Trata de Personas, NIT 7463923-4, Libro 4-ASCC Folio 132, Cuentadancia 2022-100-101-18-030');
		doc.text(10, 265, ' ______________________________________________________________________________________________________________________________');
		doc.text(75, 268, ' Original--Expediente-Duplicado--Contabilidad');
			
		}




		  doc.setFontType("normal");

	
		 doc.setFontSize("8");
		 doc.setFontType("bold");
		 //doc.text(25, 230, 'Observaciones:');

		 doc.setFontSize("7");
		 doc.setFontType("normal");
	
		doc.setFontSize("10");

		 doc.setFontType("bold");
		



	   doc.setTextColor(255, 0, 0); //set font color to red
	  
		 doc.setFontSize(8);
		 doc.setTextColor(5, 83, 142);
	
	   doc.save('Solicitud - '+ data.correlativo +'.pdf'); // Save the PDF with name "katara"...

function Unidades(num){
 
  switch(num)
  {
    case 1: return "UN";
    case 2: return "DOS";
    case 3: return "TRES";
    case 4: return "CUATRO";
    case 5: return "CINCO";
    case 6: return "SEIS";
    case 7: return "SIETE";
    case 8: return "OCHO";
    case 9: return "NUEVE";
  }
 
  return "";
}
 
function Decenas(num){
 
  decena = Math.floor(num/10);
  unidad = num - (decena * 10);
 
  switch(decena)
  {
    case 1:
      switch(unidad)
      {
        case 0: return "DIEZ";
        case 1: return "ONCE";
        case 2: return "DOCE";
        case 3: return "TRECE";
        case 4: return "CATORCE";
        case 5: return "QUINCE";
        default: return "DIECI" + Unidades(unidad);
      }
    case 2:
      switch(unidad)
      {
        case 0: return "VEINTE";
        default: return "VEINTI" + Unidades(unidad);
      }
    case 3: return DecenasY("TREINTA", unidad);
    case 4: return DecenasY("CUARENTA", unidad);
    case 5: return DecenasY("CINCUENTA", unidad);
    case 6: return DecenasY("SESENTA", unidad);
    case 7: return DecenasY("SETENTA", unidad);
    case 8: return DecenasY("OCHENTA", unidad);
    case 9: return DecenasY("NOVENTA", unidad);
    case 0: return Unidades(unidad);
  }
}//Unidades()
 
function DecenasY(strSin, numUnidades){
  if (numUnidades > 0)
    return strSin + " Y " + Unidades(numUnidades)
 
  return strSin;
}//DecenasY()
 
function Centenas(num){
 
  centenas = Math.floor(num / 100);
  decenas = num - (centenas * 100);
 
  switch(centenas)
  {
    case 1:
      if (decenas > 0)
        return "CIENTO " + Decenas(decenas);
      return "CIEN";
    case 2: return "DOSCIENTOS " + Decenas(decenas);
    case 3: return "TRESCIENTOS " + Decenas(decenas);
    case 4: return "CUATROCIENTOS " + Decenas(decenas);
    case 5: return "QUINIENTOS " + Decenas(decenas);
    case 6: return "SEISCIENTOS " + Decenas(decenas);
    case 7: return "SETECIENTOS " + Decenas(decenas);
    case 8: return "OCHOCIENTOS " + Decenas(decenas);
    case 9: return "NOVECIENTOS " + Decenas(decenas);
  }
 
  return Decenas(decenas);
}//Centenas()
 
function Seccion(num, divisor, strSingular, strPlural){
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  letras = "";
 
  if (cientos > 0)
    if (cientos > 1)
      letras = Centenas(cientos) + " " + strPlural;
    else
      letras = strSingular;
 
  if (resto > 0)
    letras += "";
 
  return letras;
}//Seccion()
 
function Miles(num){
  divisor = 1000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMiles = Seccion(num, divisor, "MIL", "MIL");
  strCentenas = Centenas(resto);
 
  if(strMiles == "")
    return strCentenas;
 
  return strMiles + " " + strCentenas;
 
  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
}//Miles()
 
function Millones(num){
  divisor = 1000000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
  strMiles = Miles(resto);
 
  if(strMillones == "")
    return strMiles;
 
  return strMillones + " " + strMiles;
 
  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
}//Millones()
 
function NumeroALetras(num,centavos){
  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
  };
  if(centavos == undefined || centavos==false) {
    data.letrasMonedaPlural="";
    data.letrasMonedaSingular="";
  }else{
    data.letrasMonedaPlural="CENTIMOS";
    data.letrasMonedaSingular="CENTIMO";
  }
 
  if (data.centavos > 0)
    data.letrasCentavos = "CON " + NumeroALetras(data.centavos,true);
 
  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
}//NumeroALetras()




	 }


}).done( function(data) {
}).fail( function( jqXHR, textSttus, errorThrown){

alert(errorThrown);

});
}

