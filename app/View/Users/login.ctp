<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#UserEsqueciMinhaSenhaForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/pages/envia_senha",
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Senha enviada com sucesso.", function(){ location.reload(); });
                    }else if(retorno == 2){
                        bootbox.alert("E-mail não localizado, Por favor, tente novamente.", function(){ location.reload(); });
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
                	}
                }
           });
           return false;
    	});
    });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <?=$this->Session->flash(); ?>
            <div class="panel-heading">
                <h3 class="panel-title">Entre com seu usuário e senha</h3>
            </div>
            <div class="panel-body">
                <form id="UserLoginForm" role="form" action="<?=$this->base?>/users/login" method="post" accept-charset="utf-8">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" required="required" placeholder="Usuário" name="data[User][username]" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="required" placeholder="Senha" name="data[User][password]" type="password" value="">
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <input  class="btn btn-lg btn-info btn-block" type="submit" value="Login"/>
                        <br />
                        <p><a data-toggle="modal" data-target="#novaempresa" href="#">Cadastre agora</a></p>
                        <p><a data-toggle="modal" data-target="#esqueciSenha" href="#">Esqueci Minha Senha</a></p>
                    </fieldset>
                </form>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="esqueciSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Esqueci Minha Senha</h4>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                              <form id="UserEsqueciMinhaSenhaForm" role="form" action="#" method="post" accept-charset="utf-8">
                                  <fieldset>
                                      <div class="form-group">
                                          <input class="form-control" required="required" placeholder="Digite seu e-mail" name="data[User][email]" type="email" value="" autofocus autocomplete="off">
                                      </div>
                                      <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Fechar</button>
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                      </div>
                                  </fieldset>
                              </form>
                          </div>
                        </div>
                     </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

			<!-- Modal -->
            <div class="modal fade" id="novaempresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Nova empresa</h4>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                              <form id="UserEsqueciMinhaSenhaForm" role="form" action="#" method="post" accept-charset="utf-8">
                                  <fieldset>
                                      <div class="form-group">
                                          <input class="form-control" required="required" placeholder="Digite seu e-mail" name="data[User][email]" type="email" value="" autofocus autocomplete="off">
                                      </div>
                                      <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Fechar</button>
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                      </div>
                                  </fieldset>
                              </form>
                          </div>
                        </div>
                     </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </div>
    </div>
</div>