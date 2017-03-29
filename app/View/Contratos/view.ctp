 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Visualizar Contrato</h4>
 </div>
 <div class="modal-body">
    <div class="row no-gutter">
        <div class="col-lg-2 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Cód.</label>
                <div><?=$contrato['Contrato']['id']?></div>
            </div>
        </div>
        <div class="col-lg-10 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Cliente</label>
                <div><?=$contrato['Cliente']['razao_social']?></div>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-6 col-sm-3 col-sx-3">
            <div class="form-group">
                <label>Data</label>
                <div><?=$contrato['Contrato']['data']?></div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-3 col-sx-3">
            <div class="form-group">
                <label>Vigência</label>
                <div><?=$contrato['Contrato']['inicio_vigencia']?> - <?=$contrato['Contrato']['termino_vigencia']?></div>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Descrição</label>
                <div><?=$contrato['Contrato']['descricao']?></div>
            </div>
        </div>
    </div>
    <?php
        if(!empty($contrato['Contrato']['observacoes'])):
    ?>
          <div class="row no-gutter">
              <div class="col-lg-12 col-sm-6 col-sx-6">
                  <div class="form-group">
                      <label>Observações</label>
                      <div><?=$contrato['Contrato']['observacoes']?></div>
                  </div>
              </div>
          </div>
    <?php
        endif;
    ?>
    <div class="row no-gutter">
        <div class="col-lg-4 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Investimento</label>
                <div>R$<?=$contrato['Contrato']['investimento']?></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Nº de Cota</label>
                <div><?=$contrato['Contrato']['numero_cota']?></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Anexo</label>
                <?php
                    if(!empty($contrato['Contrato']['anexo'])):
                        echo '<div>'.$this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/contrato/anexo/'.$contrato['Contrato']['dir'].'/'.$contrato['Contrato']['anexo'], array('target'=>'_blank', 'escape' => false)).'</div>';
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-4 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Status</label>
                <div><?=$this->Util->statusContrato($contrato['Contrato']['status'])?></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-1 col-sx-1">
            <div class="form-group">
                <label>Usuário</label>
                <div><?=$contrato['User']['nome']?></div>
            </div>
        </div>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
 </div>
