<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<?php
    echo $this->Html->script('full-calendar/jquery-1.5.min', array('block'=>'customArchives'));
    echo $this->Html->script('full-calendar/jquery-ui-1.8.9.custom.min', array('block'=>'customArchives'));
    echo $this->Html->script('full-calendar/fullcalendar.min', array('block'=>'customArchives'));
    echo $this->Html->script('full-calendar/ready', array('block'=>'customArchives'));
    echo $this->Html->css('full-calendar/fullcalendar');
?>
<script type="text/javascript">
    base = '<?=$this->base ?>';
</script>
<?php

?>
<div class="Calendar index">
	<div id="calendar"></div>
</div>
