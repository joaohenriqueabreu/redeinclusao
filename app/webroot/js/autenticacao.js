$(function() {
	$('#UserEsqueciMinhaSenhaForm').submit(function(){
    	$.post(urlBase+'/users/envia_senha',$(this).serialize(),function(retorno){
    		if(retorno == 1){
              bootbox.alert("Nova senha enviada com sucesso!");
            }else if(retorno == 2){
              bootbox.alert("E-mail não encontrado!");
    		}else{
              bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
    		}
            $('#esqueciSenha').modal('hide');
    	});
		return false;
	});
});
