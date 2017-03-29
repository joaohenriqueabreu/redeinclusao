<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
        echo $this->Html->css('curriculo');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script>

  $(document).ready(function(){

    $('.ativa_carregando').live('click',function(){
        $('#loading_block').show();
    });

    setInterval('$(".message").remove();',10000);

    $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
    });

    $('.fancybox').live('click',function(){
          $.fancybox({
      		'type'				: 'iframe',
      		'width'				: '50%',
      		'height'			: 100,
      		'scrolling'   		: 'no',
            'autoScale'     	: false,
            'transitionIn'		: 'elastic',
            'transitionOut'		: 'elastic',
            'href'              : $(this).attr('href')
          });
          return false;
      });

      $( "#tabs" ).tabs();
      $( "#dialog-link, #icons li" ).hover(
        function() {
          $( this ).addClass( "ui-state-hover" );
        },
        function() {
          $( this ).removeClass( "ui-state-hover" );
        }
      );

      $('.destaque h2').live('click',function() {
  			if($(this).next('div,table,p').is('.aberto')){
  			    $(this).next('div,table,p').fadeOut().removeClass('aberto');
  			}else{
      			$(this).next('div,table,p').fadeIn().addClass('aberto');
              }
  			return false;
    }).next().hide();
  });

</script>
</head>
<body>
    <div id="loading_block"><div class="image_block"><?php echo $this->Html->image('loading.gif');?></div></div>
    <div class = "log">
        <span class="display_logado"><?php if(isset($_SESSION['Auth']['User'])&&!empty($_SESSION['Auth']['User'])){echo $_SESSION['Auth']['User']['username']; ?> | <?php echo $this->Html->link('Configuração',array('controller'=>'users','action'=>'configuracao'));?> | <?php echo $this->Html->link('Sair','/users/logout');} ?></span>
	</div>
	<div id="container">

        <? if(!empty($_SESSION['Auth'])): ?>
            <div id = "menu_principal">
                <div class="logo"><a class="brand" href=""><img src="<?=$this->base?>/img/logorede.png" width="100%" /></a></div>
                <div class="menu-hv">
                    <?php echo $this->Menu->generateMenu();?>
                </div>
            </div>
        <? endif; ?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
