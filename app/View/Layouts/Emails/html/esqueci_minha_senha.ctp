Prezado(a),
<br /><br />
Atendendo a um pedido feito, estamos enviando a nova senha de acesso ao sistema do Instituto Ester para este usuário.
<br /><br />
Dados de acesso:<br />
Usuário: <b><?php echo $dadosEmail['username']; ?></b><br />
Nova Senha: <b><?php echo $dadosEmail['password']; ?></b><br />
<br /><br />
<?php echo $this->Html->link('Clique aqui',$this->Html->url( '/', true ));?> para acessar o sistema.
<br /><br />
<small>
    E-mail solicitado por: <?php echo $_SERVER['REMOTE_ADDR'];?><br />
    Data/Hora: <?php echo date('d/m/Y - H:i:s');?><br />
</small>