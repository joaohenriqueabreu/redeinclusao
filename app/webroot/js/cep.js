    $(document).ready(function(){
		$('#cep').blur(function(){
			setTimeout(function(){
				if($('#cep').val()!='' && $('#cep').val()!=undefined){
					$.ajax({
						type: 'GET',
						dataType: 'xml',
                        url: urlBase+'/cep/busca/'+$('#cep').val(),
                        beforeSend: function(){
                            //$('#processing-modal').modal('show');
                            $('#processing-modal').modal({
                              "backdrop"  : "static",
                              "keyboard"  : true,
                              "show"      : true
                            });
                        },
						success:function(dataset){
                            $('#processing-modal').modal('hide');
							$(document).css({cursor:''});
    							$(dataset).find('endereco').each(function(){
    								switch($(this).find('resultado').text()){
    									case '1':
    										break;
    									case '2':
    										break;
    									case '-1':
    										alert('CEP não encontrado');
    										break;
    									case '-2':
    										alert('Formato de CEP inválido');
    										break;
    									case '-3':
    										alert('Limite de buscas de ip por minuto excedido');
    										break;
    									case '-4':
    										alert('Ip banido. Contate o administrador');
    										break;
    									default:
    										alert('Erro ao conectar-se tente novamente');
    										break;

    								}//end switch resultado
    							   	if($(this).find('resultado').text()==1){
    									$("#uf").attr({ value: $(this).find('uf').text() });
    									$("#cidade").attr({ value: $(this).find('cidade').text() });
    									$("#bairro").attr({ value: $(this).find('bairro').text() });
    									$("#logradouro").attr({ value: $(this).find('logradouro').text()});
    							   	}
                                    if($(this).find('resultado').text()==2){
    									$("#uf").attr({ value: $(this).find('uf').text() });
    									$("#cidade").attr({ value: $(this).find('cidade').text() });
    							   	}
                                    //end resultado true
                                    $('#processing-modal').modal('hide');
    							});//end each endereco
						}//end success
					});//end ajax
				}//end if value
			},1);//end setTimeout of masked
		});//end cep blur
	})//end document ready