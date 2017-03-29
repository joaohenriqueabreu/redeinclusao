<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="http://redeinclusao.org.br/v2/img/logo_iea_topo.png" width="200" alt="topo" /></td>
  </tr>
  <tr>
    <td bgcolor="#F8FAFB"><table bgcolor="#F8FAFB" width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="65">&nbsp;</td>
        <td width="470"><p>&nbsp;</p>
            <?php
                if($dadosEmail['tipo'] == 'N'):
            ?>
                    <p><font face="calibri" size="3" color="#58585B"><b><?=$dadosEmail['User']['nome']?></b> adicionou uma nova tarefa.</font></p>
                    <p><font face="calibri" size="3" color="#58585B"><?=$dadosEmail['Tarefa']['tarefa']?></font></p>
            <?php
                elseif($dadosEmail['tipo'] == 'A'):
            ?>
                    <p><font face="calibri" size="3" color="#58585B">O status da tarefa <b><?=$dadosEmail['Tarefa']['tarefa']?></b> foi atualizado.</font></p>
            <?php
                elseif($dadosEmail['tipo'] == 'F'):
            ?>
                    <p><font face="calibri" size="3" color="#58585B">A tarefa <b><?=$dadosEmail['Tarefa']['tarefa']?></b> foi finalizada.</font></p>
            <?php
                endif;
            ?>
          <p><font face="calibri" size="3" color="#58585B"><strong>Acesse o portal:</strong> <a href="http://redeinclusao.org.br/v2/tarefas/minhas_tarefas?Acesso=externo&tarefa=<?=$dadosEmail['Tarefa']['id']?>">redeinclusao.org.br/v2</a></font></p>
          <p>&nbsp;</p></td>
        <td width="65">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>