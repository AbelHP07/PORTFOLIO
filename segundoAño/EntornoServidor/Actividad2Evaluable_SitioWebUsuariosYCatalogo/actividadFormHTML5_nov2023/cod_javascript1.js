	addEventListener('load',inicio,false);

   function inicio()
        {document.getElementById('temperatura').addEventListener('change',cambioTemperatura,false);}

	function cambioTemperatura()
        {document.getElementById('temp').innerHTML=document.getElementById('temperatura').value;}
		
	function popUp() {		
		var cad = "";
		cad += "Numero binario 8 dig:  " + document.getElementById('numerobin').value;
		cad += "\nNumero decimal 5 dig:  " + document.getElementById('numerodec1').value;		
		cad += "\nNumero decimal 1-6 dig:  " + document.getElementById('numerodec2').value;				
		cad += "\nEmail usuario:  " + document.getElementById('emailusuario').value;
		cad += "\nTemperatura:  " + document.getElementById('temperatura').value;
		cad += "\nFecha inicio:  " + document.getElementById('fechainic').value;
		cad += "\nHora inicio:  " + document.getElementById('time_control').value;		
		cad += "\nFecha fin:  " + document.getElementById('fechafin').value;
		cad += "\nColor:  " + document.getElementById('color1').value;
		cad += "\nValoracion form 1-5:  " + document.getElementById('valornum').value;
		cad += "\nDireccion web:  " + document.getElementById('direccion1').value;
		cad += "\nNavegador:  " + document.getElementById('navegador').value;

		alert(cad);
		}

	function fechaYHoraActual() {	
		var d = new Date();
		var numMes = d.getMonth()+1;
		var numDia = d.getDate();
		
		document.getElementById('time_control').value = d.getHours()+ ':' +d.getMinutes();			

  //numDia=4;	
		if (numDia>0 && numDia<10)
			numDia = "0" +numDia;
  //numMes=1;
		if (numMes>0 && numMes<10)
			numMes = "0" +numMes;
		//document.getElementById('txtAnuncio').innerHTML = d.getFullYear() + '-' +numMes + '-' + numDia; 
		document.getElementById('fechainic').value = d.getFullYear() + '-' +numMes + '-' + numDia; //numDia + '-' +numMes + '-' + d.getFullYear();

		//document.getElementById('fechainic').value = d.getDate()+ '/' +numMes + '/' + d.getFullYear();
		
		//document.getElementById('fechaactual').value = d.getDate()+ '/' +numMes + '/' + d.getFullYear();  //d.getDate();		
        //document.getElementById('fechah').innerHTML =  d.getDate()+ '/' +d.getMonth()+ '/' + d.getFullYear();  //'Dia de la semana: ' +d.getDay(),'<br>Mes (0 al 11): ‘+d.getMonth(),'<br>Año:’+d.getFullYear(),'<br>Hora:’+d.getHours(),'<br>HoraUTC: ‘+d.getUTCHours(),'<br>Minutos: ‘+d.getMinutes(),'<br>Segundos: ‘+d.getSeconds());
		//document.getElementById('horaactual').value = d.getHours()+ ':' +d.getMinutes();
        //document.getElementById('horah').innerHTML = d.getHours()+ ':' +d.getMinutes();		
	}