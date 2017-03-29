    <?php  /*
        //Bootstrap CSS
        echo $this->Html->css('bootstrap/css/bootstrap');
        //jQuery UI CSS
        echo $this->Html->css('jquery/jquery-ui');

        //Custom Fonts
        echo $this->Html->css('font-awesome/css/font-awesome.min');
        //Css das views          */
        echo $this->fetch('css');
    ?>
    <div id="container" class="container-fluid-ajax">
      <?php echo $this->fetch('content'); ?>
    </div>
    <?php
        //Java Scripts das views
        echo $this->fetch('customArchives');
        echo $this->fetch('codesJavaScripts');
    ?>
