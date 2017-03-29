function mascaraMutuario(o,f){

    v_obj=o

    v_fun=f

    setTimeout("execmascara()",1)

}



function execmascara(){

    v_obj.value=v_fun(v_obj.value)

}

/*

function cpfCnpj(v){

  if (v.length <= 14) { //CPF

    //Remove tudo o que não é dígito

    v=v.replace(/\D/g,"")

    //Coloca um ponto entre o terceiro e o quarto dígitos

    v=v.replace(/(\d{3})(\d)/,"$1.$2″)

    //Coloca um ponto entre o terceiro e o quarto dígitos

    //de novo (para o segundo bloco de números)

    v=v.replace(/(\d{3})(\d)/,"$1.$2″)

    //Coloca um hífen entre o terceiro e o quarto dígitos

    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2″)

    } else { //CNPJ

    //Remove tudo o que não é dígito

    v=v.replace(/\D/g,"")

    //Coloca ponto entre o segundo e o terceiro dígitos

    v=v.replace(/^(\d{2})(\d)/,"$1.$2″)

    //Coloca ponto entre o quinto e o sexto dígitos

    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3″)

    //Coloca uma barra entre o oitavo e o nono dígitos

    v=v.replace(/\.(\d{3})(\d)/,".$1/$2″)

    //Coloca um hífen depois do bloco de quatro dígitos

    v=v.replace(/(\d{4})(\d)/,"$1-$2″)

  }

    return v

}

*/

function leech(v){

	v=v.replace(/o/gi,"0")

	v=v.replace(/i/gi,"1")

	v=v.replace(/z/gi,"2")

	v=v.replace(/e/gi,"3")

	v=v.replace(/a/gi,"4")

	v=v.replace(/s/gi,"5")

	v=v.replace(/t/gi,"7")

	return v

}



function soNumeros(v){

	return v.replace(/\D/g,"")

}



function formataCPF(Campo, teclapres){

	//if (!(((event.keyCode>47)&&(event.keyCode<58))|(event.keyCode==13)|(event.keyCode==44)|(event.keyCode==46)))

	//	event.returnValue = false;

	var tecla = teclapres.keyCode;

	var vr = new String(Campo.value);

	vr = vr.replace(/[-\.]/g, "");

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8){

	if (tam > 3 && tam < 7)

	Campo.value = vr.substr(0, 3) + '.' + vr.substr(3, tam);

	if (tam >= 7 && tam <10)

	Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,tam-6);

	if (tam >= 10 && tam < 12)

	Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,3) + '-' + vr.substr(9,tam-9);

	}

}



function formataCEP(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace('-', '');

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8)

	{

		if (tam > 5)

		{

			campo.value = vr.substr(0, 5) + '-' + vr.substr(5, 3);

		}

	}

}



function formataHora(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace(':', '');

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8)

	{

		if (tam > 2)

		{

			campo.value = vr.substr(0, 2) + ':' + vr.substr(2, tam);

		}

	}

}



function formataTel(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace(/[-\.\/\(\)]/g, "");

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8)

	{

        if (tam == 3){

    	    campo.value = '(' + vr.substr(0,3) + ')' + vr.substr(3,tam);

		}

        if (tam == 7){

    	    campo.value = '(' + vr.substr(0, 2) + ')' + vr.substr(2,6) + '-' + vr.substr(6,tam);

		}

	}

}



function formataData(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace('/[\/]/g', '');

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8)

	{

        if (tam == 3){

    	    campo.value = vr.substr(0,3) + '/' + vr.substr(3,tam);

		}

        if (tam == 6){

    	    campo.value = vr.substr(0, 2) + '/' + vr.substr(3,4) + '/' + vr.substr(7,tam);

		}

	}

}



function formataDataMA(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace('/[\/]/g', '');

	tam = vr.length + 1;

	if (tecla != 9 && tecla != 8)

	{

        if (tam == 3){

    	    campo.value = vr.substr(0,3) + '/' + vr.substr(3,tam);

		}

	}

}



function formataCNPJ(Campo, teclapres){

	var tecla = teclapres.keyCode;

	var vr = new String(Campo.value);

	vr = vr.replace(/[-\.\/]/g, "");

	tam = vr.length + 1 ;

	if (tecla != 9 && tecla != 8){

		if (tam > 2 && tam < 6)

		Campo.value = vr.substr(0, 2) + '.' + vr.substr(2, tam);

		if (tam >= 6 && tam < 9)

		Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,tam-5);

		if (tam >= 9 && tam < 13)

			Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,tam-8);

		if (tam >= 13 && tam < 15)

			Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,4)+ '-' + vr.substr(12,tam-12);

	}

}



function mascaraCPFCNPJ(Campo, teclapres){

	var tecla = teclapres.keyCode;

	var vr = new String(Campo.value);



	vr = vr.replace(/[-\.\/]/g, "");

	tam = vr.length + 1;



	if(tam<=12){

		if (tecla != 9 && tecla != 8){

			if (tam > 3 && tam < 7)

				Campo.value = vr.substr(0, 3) + '.' + vr.substr(3, tam);

			if (tam >= 7 && tam <10)

				Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,tam-6);

			if (tam >= 10 && tam < 12)

				Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,3) + '-' + vr.substr(9,tam-9);

		}

	}else{

		if (tecla != 9 && tecla != 8){

			if (tam > 2 && tam < 6)

			Campo.value = vr.substr(0, 2) + '.' + vr.substr(2, tam);

			if (tam >= 6 && tam < 9)

			Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,tam-5);

			if (tam >= 9 && tam < 13)

				Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,tam-8);

			if (tam >= 13 && tam < 15)

				Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,4)+ '-' + vr.substr(12,tam-12);

		}

	}

}



function validaDataMes(campo, teclapres){

	var tecla = teclapres.keyCode;

	vr = campo.value;

	vr = vr.replace(':', '');

	tam = vr.length + 1;

		if (tam > 2)

		{

			if(campo.value < 1 || campo.value > 31){

				campo.value = '';

			}

		}

}





function romanos(v){

	v=v.toUpperCase()             //Mai�sculas

	v=v.replace(/[^IVXLCDM]/g,"") //Remove tudo o que n�o for I, V, X, L, C, D ou M

	//Essa � complicada! Copiei daqui: http://www.diveintopython.org/refactoring/refactoring.html

	while(v.replace(/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/,"")!="")

		v=v.replace(/.$/,"")

		return v

}



function site(v){

	//Esse sem comentarios para que voc� entenda sozinho ;-)

 	v=v.replace(/^http:\/\/?/,"")

	dominio=v

 	caminho=""

 	if(v.indexOf("/")>-1)

 		dominio=v.split("/")[0]

 	caminho=v.replace(/[^\/]*/,"")

 	dominio=dominio.replace(/[^\w\.\+-:@]/g,"")

 	caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")

 	caminho=caminho.replace(/([\?&])=/,"$1")

 	if(caminho!="")dominio=dominio.replace(/\.+$/,"")

 		v="http://"+dominio+caminho

 	return v

}



function OnlyNumbers(e)

{

	if(window.event) //IE

	{

		tecla = e.keyCode;

	}

	else if (e.which) //FF

	{

		tecla = e.which;

	}

	//teclas dos numemros(0 - 9) de 48 a 57

	//techa==8 � para permitir o backspace funcionar para apagar

	if ( (tecla >= 48 && tecla <= 57)||(tecla == 8 ) )

	{

		return true;

	}

	else

	{

		return false;

	}

}



function remove(str, sub)

{

	i = str.indexOf(sub);

	r = "";

	if (i == -1) return str;

	r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);

	return r;

}



function validaCpf(cpf)

{

	var numeros, digitos, soma, i, resultado, digitos_iguais;

	digitos_iguais = 1;



	cpf = remove(cpf, ".");

	cpf = remove(cpf, "-");

	if (cpf.length < 11)

		return false;



	for (i = 0; i < cpf.length - 1; i++)

		if (cpf.charAt(i) != cpf.charAt(i + 1))

		{

			digitos_iguais = 0;

			break;

		}

	if (!digitos_iguais)

	{

		numeros = cpf.substring(0,9);

		digitos = cpf.substring(9);

		soma = 0;

		for (i = 10; i > 1; i--)

			soma += numeros.charAt(10 - i) * i;

		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

		if (resultado != digitos.charAt(0))

			return false;

		numeros = cpf.substring(0,10);

		soma = 0;

		for (i = 11; i > 1; i--)

			soma += numeros.charAt(11 - i) * i;

		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

		if (resultado != digitos.charAt(1))

			return false;

		return true;

	}

	else

		return false;

}



function validaEmail(email){

	var str = email;

	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

	if(filtro.test(str)) {

		return true;

	} else {

		return false;

	}

}







function getDateObject(dateString,dateSeperator)

{

	//This function return a date object after accepting

	//a date string ans dateseparator as arguments

	var curValue=dateString;

	var sepChar=dateSeperator;

	var curPos=0;

	var cDate,cMonth,cYear;



	//extract day portion

	curPos=dateString.indexOf(sepChar);

	cDate=dateString.substring(0,curPos);



	//extract month portion

	endPos=dateString.indexOf(sepChar,curPos+1);

	cMonth=dateString.substring(curPos+1,endPos);



	//extract year portion

	curPos=endPos;

	endPos=curPos+5;

	cYear=curValue.substring(curPos+1,endPos);



	//Create Date Object

	dtObject=new Date(cYear,cMonth,cDate);

	return dtObject;

}



function limpaCampo(campoId)

{

	document.getElementById(campoId).value=""; // Limpa o campo cnpjCPF

}





function submitForm(botao_id, funcao)

{

	if(botao_id!=null){

		xajax.$(botao_id).disabled=true;

		xajax.$(botao_id).value="Aguarde...";

	}

	xajax.$('loading_block').style.display="block";

	eval(funcao);

	return false;

}

//Limpa campo

function filtraCampo(campo){

	var s = "";

	var cp = "";

	vr = campo.value;

	tam = vr.length;

	for (i = 0; i < tam ; i++) {

		if (vr.substring(i,i + 1) != "/" && vr.substring(i,i + 1) != "-" && vr.substring(i,i + 1) != "."  && vr.substring(i,i + 1) != "," ){

		 	s = s + vr.substring(i,i + 1);}

	}

	campo.value = s;

	return cp = campo.value

}



//Formata o campo valor

function formataValor(campo) {

	campo.value = filtraCampo(campo);

	vr = campo.value;

	tam = vr.length;



	if ( tam <= 2 ){

 		campo.value = vr ; }

 	if ( (tam > 2) && (tam <= 5) ){

 		campo.value = vr.substr( 0, tam - 2 ) + ',' + vr.substr( tam - 2, tam ) ; }

 	if ( (tam >= 6) && (tam <= 8) ){

 		campo.value = vr.substr( 0, tam - 5 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }

 	if ( (tam >= 9) && (tam <= 11) ){

 		campo.value = vr.substr( 0, tam - 8 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }

 	if ( (tam >= 12) && (tam <= 14) ){

 		campo.value = vr.substr( 0, tam - 11 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }

 	if ( (tam >= 15) && (tam <= 18) ){

 		campo.value = vr.substr( 0, tam - 14 ) + '.' + vr.substr( tam - 14, 3 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ;}



}



function moeda2float(moeda){

    moeda = moeda.replace(".","");

    moeda = moeda.replace(",",".");

    return parseFloat(moeda);

}



function float2moeda(num) {

    x = 0;

    if(num<0) {

      num = Math.abs(num);

      x = 1;

    }

    if(isNaN(num)) num = "0";

        cents = Math.floor((num*100+0.5)%100);



    num = Math.floor((num*100+0.5)/100).toString();



    if(cents < 10) cents = "0" + cents;

    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)

        num = num.substring(0,num.length-(4*i+3))+'.'

               +num.substring(num.length-(4*i+3));

    ret = num + ',' + cents;

    if (x == 1) ret = ' - ' + ret;return ret;

}



function roundNumber (rnum) {

   return Math.round(rnum*Math.pow(10,2))/Math.pow(10,2);

}





function abreBoleto(urlBoleto){

    window.open(urlBoleto,'Curriculo','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=800');

}



function isCnpj(cnpj) {

	var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;

	if (cnpj.length == 0) {

		return false;

	}

	

	cnpj = cnpj.replace(/\D+/g, '');

	digitos_iguais = 1;



	for (i = 0; i < cnpj.length - 1; i++)

		if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {

			digitos_iguais = 0;

			break;

		}

	if (digitos_iguais)

		return false;

	

	tamanho = cnpj.length - 2;

	numeros = cnpj.substring(0,tamanho);

	digitos = cnpj.substring(tamanho);

	soma = 0;

	pos = tamanho - 7;

	for (i = tamanho; i >= 1; i--) {

		soma += numeros.charAt(tamanho - i) * pos--;

		if (pos < 2)

			pos = 9;

	}

	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

	if (resultado != digitos.charAt(0)){

		return false;

	}

	tamanho = tamanho + 1;

	numeros = cnpj.substring(0,tamanho);

	soma = 0;

	pos = tamanho - 7;

	for (i = tamanho; i >= 1; i--) {

		soma += numeros.charAt(tamanho - i) * pos--;

		if (pos < 2)

			pos = 9;

	}



	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

	

	return (resultado == digitos.charAt(1));

}



function isCnpjFormatted(cnpj) {

	var validCNPJ = /\d{2,3}.\d{3}.\d{3}\/\d{4}-\d{2}/;

	return cnpj.match(validCNPJ);

}





function isCpf(cpf){

    exp = /\.|-/g;

    cpf = cpf.toString().replace(exp, "");

    var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));

    var digitoGerado = 0;

    var soma1=0, soma2=0;

    var vlr =11;



    for(i=0;i<9;i++){

        soma1 += eval(cpf.charAt(i)*(vlr-1));

        soma2 += eval(cpf.charAt(i)*vlr);

        vlr--;

    }

	

    soma1 = (soma1%11) < 2 ? 0 : 11 - (soma1%11);

    aux = soma1 * 2;

    soma2 = soma2 + aux;

    soma2 = (soma2%11) < 2 ? 0 : 11 - (soma2%11);

   

   if(cpf == "11111111111" || cpf == "22222222222" || cpf ==

			"33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf ==

			"66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf ==

			"99999999999" || cpf == "00000000000" ){

	digitoGerado = null;

    }else{

        digitoGerado = eval(soma1.toString().charAt(0) + soma2.toString().charAt(0));

    }

	

	if(digitoGerado != digitoDigitado){

       return false;

    }

    return true;

}

function isCpfFormatted(cpf) {

	var validCPF = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

	return cpf.match(validCPF);

}



