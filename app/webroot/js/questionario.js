function addFormOpcoes() {
	var input = document.getElementById("cont_id_op");
	id = input.value;
	id++;
	input.value = id;
	$("#divOpcoes").append("<p id=op_"+id+"><a href=\"#\" onclick=\"removeFormField('op_"+id+"'); return false;\" class=\"remover\"></a><textarea name=\"data[Opcao]["+id+"][nome]\" value=\"\" class=\"form-control required\"></textarea></p>");
}
function addFormAlternativas() {
	var input = document.getElementById("cont_id_al");
	id = input.value;
	id++;
	input.value = id;
	$("#divAlternativas").append("<p id=al_"+id+"><a href=\"#\" onclick=\"removeFormField('al_"+id+"'); return false;\" class=\"remover\"></a><textarea name=\"data[Alternativa]["+id+"][nome]\" value=\"\" class=\"form-control required\"></textarea></p>");
}

function removeFormField(id) {
	$("p#"+id).remove();
}
function removeOpcaoBD(id,campo) {
	if (confirm("Tem certeza que deseja apagar?")){
		$.get('../deleteOpcao/'+campo);
		$("p#"+id).remove();
	}
}
function removeAlternativaBD(id,campo) {
	if (confirm("Tem certeza que deseja apagar?")){
		$.get('../deleteAlternativa/'+campo);
		$("p#"+id).remove();
	}
}
    $(document).ready(function(){
        $(".tipoForumalario").change(function() {

            var opcoes = '<div><label for="opcoes">Opções: </label></div><div><div id="divOpcoes"><input type="hidden" value="0" id="cont_id_op"/><p id="op_0"><a onclick="removeFormField(\'op_0\'); return false;" href="#" class="remover"></a><textarea value="" name="data[Opcao][0][nome]" class="form-control required"></textarea></p></div><a onclick="addFormOpcoes(); return false;" href="#" class="add">Adicionar Opção</a></div>';
        	var texto = '<div><label for="opcoes">Opções: </label></div><div><div class="input textarea"><textarea id="PerguntaOpcoes" rows="6" cols="30" name="data[Opcao][0][nome]" class="form-control required"></textarea></div></div>';
        	var alternativa = '<div><label for="alternativas">Alternativas: </label></div><div><div id="divAlternativas"><input type="hidden" value="0" id="cont_id_al"/><p id="al_0"><a onclick="removeFormField(\'al_0\'); return false;" href="#" class="remover"></a><textarea value="" name="data[Alternativa][0][nome]" class="form-control required"></textarea></p></div><a onclick="addFormAlternativas(); return false;" href="#" class="add">Adicionar Alternativa</a>';
        	var simples = '';

        	switch($(this).val()){
        		case '1':
        		case '2':
        			$('#alternativas').css('display','none');
        			$('#alternativas').html();
        			$('#opcoesLinha').css('display','');
        			$('#opcoesLinha').html(opcoes);
        		break;

        		case '6':
        		case '7':
        			$('#alternativas').css('display','');
        			$('#alternativas').html(alternativa);
        			$('#opcoesLinha').css('display','');
        			$('#opcoesLinha').html(opcoes);
        		break;
        		default:
        			$('#alternativas').css('display','none');
        			$('#alternativas').html('');
        			$('#opcoesLinha').css('display','none');
           			$('#opcoesLinha').html(simples);
        		break;
        	}
        });
    });
