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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Fundacion Simon I. Pati&ntilde;o - <?php echo $title_for_layout; ?></title>

        <link href="/img/sistemas.ico" rel="icon" type="image/png"  />
        <!--[if IE]>
            <link href="/img/sistemas.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <![endif]-->
        <?php
        $opciones = array('inline' => true);
        echo $this->Html->css('http://localhost/libs/extjs-4.1.1/resources/css/ext-all.css', 'stylesheet', $opciones);
        echo $this->Html->script('http://localhost/libs/extjs-4.1.1/ext-all-dev.js', $opciones);

        echo $this->Html->css('application');
        echo $this->Html->css('iconos');
        echo $this->Html->css('chooser');
        //echo $this->Html->meta('icon');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="title">
                    Sistema de informacion de la Fundacion Simon I. Pati&ntilde;o
                </div>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                <div style="float: left; padding-top: 10px;">
                    Fundacion Sim&oacute;n I. Pati&ntilde;o &copy; - Todos los derechos reservados 2012
                </div>
            </div>
        </div>

        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>


