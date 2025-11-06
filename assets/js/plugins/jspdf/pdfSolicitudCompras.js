                  function pdfDetalleCompra(solicitud){
	$.ajax({
    type: "POST",
    url: "compras/php/hojaDetalleCompra.php",
    data: {solicitud:solicitud}, //f de fecha y u de estado.
  dataType:'json',

//destino
    beforeSend:function(){
       
          },
          success:function(data){


	var doc = new jsPDF();
        
        var logo1 = new Image();
       logo1.src = 'assets/img/solicitud.jpeg';
	   doc.addImage(logo1, 'jpeg', 9, 6, 200, 260);

		 doc.setFontType("bold");
		 doc.setTextColor(68, 68, 68);

		// doc.setFontSize(12.5);
		// doc.writeText(0, 65 ,'SOLICITUD DE VIATICOS 6',{align:'center',width:211});
		 doc.setFontSize("6");
                  //doc.text(190, 25, data.id1);
                    //doc.text(175, 30, data.Total);
                    
                    
                  //   doc.writeText(35, 47 ,'SECRETARIA CONTRA LA VIOLENCIA SEXUAL, EXPLOTACION Y TRATA DE PERSONAS7777777.');
            //var p_lineas2 = doc.splitTextToSize(data.obj, 58);

		// doc.text(12, 73, p_lineas2); 
		// doc.text(25, 80, 'Nombramiento :');
		 //doc.text(25, 86, 'Autorizado :');
                 
                  //doc.text(69, 79, data.lugar1);
                 //  var p_lineas5 = doc.splitTextToSize(data.lugar1, 30);

		// doc.text(69, 79, p_lineas5); 
                  
                  
                  
                  
                  
                 //  doc.text(104, 86, data.Total2);

		// doc.text(25, 92, 'Dep.(s) :');
		// doc.text(25, 98, 'Solicitante :');

		 doc.setFontType("normal");
		 doc.setTextColor(68, 68, 68);
                 doc.setFontSize("6");
	
              //  doc.text(80, 215,  data.correlativo);
               // doc.text(173, 79,  data.desa);

		 doc.text(208, 25,  data.id_soli);  //id_soli
                doc.text(204, 25,"REF");  //id_soli
                doc.text(59, 42, data.fecha); 
                doc.text(59, 49,  data.departamento);
               
                doc.text(192, 49,  data.clasificacion);  //id_soli
               
                //doc.text(10, 123,  data.caracteristicas);
 // Primera detalle

 var p_lineasd1 = doc.splitTextToSize(data.caracteristicas1, 10);//58
   doc.text(10, 74, p_lineasd1); 
 var p_lineasd2 = doc.splitTextToSize(data.caracteristicas2, 11);//58
   doc.text(20, 74, p_lineasd2); 
 var p_lineasd3 = doc.splitTextToSize(data.caracteristicas3, 12);//58
   doc.text(32, 74, p_lineasd3); 
 var p_lineasd4 = doc.splitTextToSize(data.caracteristicas4, 10);//58
   doc.text(46, 74, p_lineasd4); 
 var p_lineasd5 = doc.splitTextToSize(data.caracteristicas5, 16);//58
   doc.text(56, 74, p_lineasd5); 
 var p_lineasd6 = doc.splitTextToSize(data.caracteristicas6, 98);//58
   doc.text(73, 74, p_lineasd6); 
 var p_lineasd7 = doc.splitTextToSize(data.caracteristicas7, 10);//58
   doc.text(178, 74, p_lineasd7); 
 var p_lineasd8 = doc.splitTextToSize(data.caracteristicas8, 10);//58
   doc.text(186, 74, p_lineasd8); 

// Segundo detalle

 var p_lineasd11 = doc.splitTextToSize(data.caracteristicas11, 10);//58
   doc.text(10, 85, p_lineasd11); 
 var p_lineasd21 = doc.splitTextToSize(data.caracteristicas21, 11);//58
   doc.text(20, 85, p_lineasd21); 
 var p_lineasd31 = doc.splitTextToSize(data.caracteristicas31, 12);//58
   doc.text(32, 85, p_lineasd31); 
 var p_lineasd41 = doc.splitTextToSize(data.caracteristicas41, 10);//58
   doc.text(46, 85, p_lineasd41); 
 var p_lineasd51 = doc.splitTextToSize(data.caracteristicas51, 16);//58
   doc.text(56, 85, p_lineasd51); 
 var p_lineasd61 = doc.splitTextToSize(data.caracteristicas61, 98);//58
   doc.text(73, 85, p_lineasd61); 
 var p_lineasd71 = doc.splitTextToSize(data.caracteristicas71, 10);//58
   doc.text(178, 85, p_lineasd71); 
 var p_lineasd81 = doc.splitTextToSize(data.caracteristicas81, 10);//58
   doc.text(186, 85, p_lineasd81);


 // tervelle

 var p_lineasd13 = doc.splitTextToSize(data.caracteristicas13, 10);//58
   doc.text(10, 96, p_lineasd13); 
 var p_lineasd23 = doc.splitTextToSize(data.caracteristicas23, 11);//58
   doc.text(20, 96, p_lineasd23); 
 var p_lineasd33 = doc.splitTextToSize(data.caracteristicas33, 12);//58
   doc.text(32, 96, p_lineasd33); 
 var p_lineasd43 = doc.splitTextToSize(data.caracteristicas43, 10);//58
   doc.text(46, 96, p_lineasd43); 
 var p_lineasd53 = doc.splitTextToSize(data.caracteristicas53, 16);//58
   doc.text(56, 96, p_lineasd53); 
 var p_lineasd63 = doc.splitTextToSize(data.caracteristicas63, 98);//58
   doc.text(73, 96, p_lineasd63); 
 var p_lineasd73 = doc.splitTextToSize(data.caracteristicas73, 10);//58
   doc.text(178, 96, p_lineasd73); 
 var p_lineasd83 = doc.splitTextToSize(data.caracteristicas83, 10);//58
   doc.text(186, 96, p_lineasd83); 

// cuarto detalle

 var p_lineasd14 = doc.splitTextToSize(data.caracteristicas14, 10);//58
   doc.text(10, 107, p_lineasd14); 
 var p_lineasd24 = doc.splitTextToSize(data.caracteristicas24, 11);//58
   doc.text(20, 107, p_lineasd24); 
 var p_lineasd34 = doc.splitTextToSize(data.caracteristicas34, 12);//58
   doc.text(32, 107, p_lineasd34); 
 var p_lineasd44 = doc.splitTextToSize(data.caracteristicas44, 10);//58
   doc.text(46, 107, p_lineasd44); 
 var p_lineasd54 = doc.splitTextToSize(data.caracteristicas54, 16);//58
   doc.text(56, 107, p_lineasd54); 
 var p_lineasd64 = doc.splitTextToSize(data.caracteristicas64, 98);//58
   doc.text(73, 107, p_lineasd64); 
 var p_lineasd74 = doc.splitTextToSize(data.caracteristicas74, 10);//58
   doc.text(178, 107, p_lineasd74); 
 var p_lineasd84 = doc.splitTextToSize(data.caracteristicas84, 10);//58
   doc.text(186, 107, p_lineasd84); 



//

// quinto detalle

 var p_lineasd15 = doc.splitTextToSize(data.caracteristicas15, 10);//58
   doc.text(10, 118, p_lineasd15); 
 var p_lineasd25 = doc.splitTextToSize(data.caracteristicas25, 11);//58
   doc.text(20, 118, p_lineasd25); 
 var p_lineasd35 = doc.splitTextToSize(data.caracteristicas35, 12);//58
   doc.text(32, 118, p_lineasd35); 
 var p_lineasd45 = doc.splitTextToSize(data.caracteristicas45, 10);//58
   doc.text(46, 118, p_lineasd45); 
 var p_lineasd55 = doc.splitTextToSize(data.caracteristicas55, 16);//58
   doc.text(56, 118, p_lineasd55); 
 var p_lineasd65 = doc.splitTextToSize(data.caracteristicas65, 98);//58
   doc.text(73, 118, p_lineasd65); 
 var p_lineasd75 = doc.splitTextToSize(data.caracteristicas75, 10);//58
   doc.text(178, 118, p_lineasd75); 
 var p_lineasd85 = doc.splitTextToSize(data.caracteristicas85, 10);//58
   doc.text(186, 118, p_lineasd85); 

// Sexto detalle

 var p_lineasd16 = doc.splitTextToSize(data.caracteristicas16, 10);//58
   doc.text(10, 129, p_lineasd16); 
 var p_lineasd26 = doc.splitTextToSize(data.caracteristicas26, 11);//58
   doc.text(20, 129, p_lineasd26); 
 var p_lineasd36 = doc.splitTextToSize(data.caracteristicas36, 12);//58
   doc.text(32, 129, p_lineasd36); 
 var p_lineasd46 = doc.splitTextToSize(data.caracteristicas46, 10);//58
   doc.text(46, 129, p_lineasd46); 
 var p_lineasd56 = doc.splitTextToSize(data.caracteristicas56, 16);//58
   doc.text(56, 129, p_lineasd56); 
 var p_lineasd66 = doc.splitTextToSize(data.caracteristicas66, 98);//58
   doc.text(73, 129, p_lineasd66); 
 var p_lineasd76 = doc.splitTextToSize(data.caracteristicas76, 10);//58
   doc.text(178, 129, p_lineasd76); 
 var p_lineasd86 = doc.splitTextToSize(data.caracteristicas86, 10);//58
   doc.text(186, 129, p_lineasd86);


 // Septimo detalle

 var p_lineasd17 = doc.splitTextToSize(data.caracteristicas17, 10);//58
   doc.text(10, 140, p_lineasd17); 
 var p_lineasd27 = doc.splitTextToSize(data.caracteristicas27, 11);//58
   doc.text(20, 140, p_lineasd27); 
 var p_lineasd37 = doc.splitTextToSize(data.caracteristicas37, 12);//58
   doc.text(32, 140, p_lineasd37); 
 var p_lineasd47 = doc.splitTextToSize(data.caracteristicas47, 10);//58
   doc.text(46, 140, p_lineasd47); 
 var p_lineasd57 = doc.splitTextToSize(data.caracteristicas57, 16);//58
   doc.text(56, 140, p_lineasd57); 
 var p_lineasd67 = doc.splitTextToSize(data.caracteristicas67, 98);//58
   doc.text(73, 140, p_lineasd67); 
 var p_lineasd77 = doc.splitTextToSize(data.caracteristicas77, 10);//58
   doc.text(178, 140, p_lineasd77); 
 var p_lineasd87 = doc.splitTextToSize(data.caracteristicas87, 10);//58
   doc.text(186, 140, p_lineasd87); 

// octavo detalle

 var p_lineasd18 = doc.splitTextToSize(data.caracteristicas18, 10);//58
   doc.text(10, 151, p_lineasd18); 
 var p_lineasd28 = doc.splitTextToSize(data.caracteristicas28, 11);//58
   doc.text(20, 151, p_lineasd28); 
 var p_lineasd38 = doc.splitTextToSize(data.caracteristicas38, 12);//58
   doc.text(32, 151, p_lineasd38); 
 var p_lineasd48 = doc.splitTextToSize(data.caracteristicas48, 10);//58
   doc.text(46, 151, p_lineasd48); 
 var p_lineasd58 = doc.splitTextToSize(data.caracteristicas58, 16);//58
   doc.text(56, 151, p_lineasd58); 
 var p_lineasd68 = doc.splitTextToSize(data.caracteristicas68, 98);//58
   doc.text(73, 151, p_lineasd68); 
 var p_lineasd78 = doc.splitTextToSize(data.caracteristicas78, 10);//58
   doc.text(178, 151, p_lineasd78); 
 var p_lineasd88 = doc.splitTextToSize(data.caracteristicas88, 10);//58
   doc.text(186, 151, p_lineasd88); 


//


//

/*

 var p_lineas4 = doc.splitTextToSize(data.caracteristicas31, 160);//58
   doc.text(10, 88, p_lineas4); 
var p_lineas44 = doc.splitTextToSize(data.caracteristicas32, 12);//58
   doc.text(55, 88, p_lineas44); 
var p_lineas444 = doc.splitTextToSize(data.caracteristicas33, 105);//58
   doc.text(72, 88, p_lineas444); 
var p_lineas4444 = doc.splitTextToSize(data.caracteristicas34, 90);//58
   doc.text(178, 88, p_lineas4444); */


//

//var p_lineas34 = doc.splitTextToSize(data.caracteristicas5, 87);//58
   //doc.text(103, 108, p_lineas34); 

// var p_lineas4 = doc.splitTextToSize(data.caracteristicas1, 50);//58
  // doc.text(100, 108, p_lineas4); 
//var p_lineas5 = doc.splitTextToSize(data.caracteristicas2, 50);//58
  // doc.text(100, 118, p_lineas5); 


                var p_lineas2 = doc.splitTextToSize(data.observaciones, 194);//58
   doc.text(11, 208, p_lineas2); 



                // doc.text(173, 106,  data.tgas);
                // doc.text(173, 120,  data.tgas);
               //   doc.text(173, 146, data.Totalsolicitado);  //total solicitado normalmente sin ampliacion
			
				/* if (data.complemento>0){
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
				
				  }   */
                
            		  
				  
				  
				  
                  // var a= data.Total;
                //  var b=a.toString(10);
                 // var res= NumeroALetras(b);
                  
                 //doc.text(47, 53,res );
               
		// doc.text(31, 187, data.autorizado2);
                 //doc.text(31, 192, data.puesto);
				//  doc.writeText(161, 192 ,'NIT:');
                  // doc.text(171, 192, data.nit);
                   //doc.writeText(128, 192 ,'Q');
                  // doc.text(131, 192, data.sueldo); //sueldo
                //   doc.text(89, 198, data.partida); // partida presupuestaria
                  
                  // doc.text(40, 220, data.autorizado);
                   //	 doc.text(40, 225, data.puesto2);
                   //  doc.writeText(0, 231 ,'Guatemala,'+data.fechaf,{align:'center',width:190});
                // doc.text(35, 155, data.puesto);

		 doc.setFontSize("6");

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
      doc.setFontSize("6");
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


		 doc.setFontSize(6);

		 doc.setTextColor(255, 255, 255);
		 doc.setFontType("bold");
	
		// doc.text(45, 137, p_lineas3);
		 doc.setTextColor(68, 68, 68);



		  doc.setFontType("normal");

	
		 doc.setFontSize("6");
		 doc.setFontType("bold");
		 //doc.text(25, 230, 'Observaciones:');

		 doc.setFontSize("6");
		 doc.setFontType("normal");
	
		doc.setFontSize("6");

		 doc.setFontType("bold");
		



	   doc.setTextColor(255, 0, 0); //set font color to red
	  
		 doc.setFontSize(6);
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

