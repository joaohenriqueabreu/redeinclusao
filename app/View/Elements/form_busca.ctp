<form action=""  method="get" accept-charset="utf-8" class = "form_busca">
    <div class="required" style = "width: 90%">
    	<label>Nome</label>
        <input name="pesquisar" <? if(isset($_GET['pesquisar'])){ ?> value = "<?=$_GET['pesquisar']?>" <? } ?> maxlength="45" type="text" />
    </div>
    <div class="submit" style = "padding-top:20px">
    	<input  type="submit" value="Buscar"/>
   </div>
</form>