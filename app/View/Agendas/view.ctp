 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Evento</h4>
 </div>
 <div class="modal-body">
    <div class="row no-gutter">
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Título</label>
                <p><?=$agenda['Agenda']['titulo']?></p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Local</label>
                <p><?=$agenda['Agenda']['local']?></p>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Descrição</label>
                <p><?=$agenda['Agenda']['descricao']?></p>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Período</label>
                <p><?=$agenda['Agenda']['inicio']?> - <?=$agenda['Agenda']['termino']?></p>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Usuário</label>
                <p><?=$agenda['User']['nome']?></p>
            </div>
        </div>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
 </div>