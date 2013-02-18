<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
	<head>
		<html xmlns:fb="http://www.facebook.com/2008/fbml">
		<meta http-equiv="Content-Type"  content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>"/>
		<title><?php wp_title('-', true, 'right'); echo wp_specialchars(get_bloginfo('name'), 1) ?></title>
		<meta name="author" content="Carlos" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/iventia.responsive.css" />


	</head>

<body>

<div class="navbar navbar-inverse navbar-static-top iventia-nav-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="row-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo home_url(); ?>"><h1>Iventia <span>Blog</span></h1></a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="iventia.me/app_dev.php/"><?php _e('Ofertas') ?></a></li>
                        <li><a href="#"><?php _e('Directory') ?></a></li>
                        <li><a href="#"><?php _e('Catálogo') ?></a></li>
                        <li><a href="<?php echo home_url(); ?>"><?php _e('Blog') ?></a></li>
                        <li><a href="#"><?php _e('Contacto') ?></a></li>
                            <?php if (!(current_user_can('level_0'))){ ?>
                                <li class="nav-purple"><a href="#" data-toggle="collapse" data-target=".navbar-form"><?php _e('Acceso') ?></a></li>
                            <?php } else {
                                global $current_user;
                                get_currentuserinfo();
                             ?>
                                <li class="dropdown nav-user">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php echo ucfirst($current_user->display_name) ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="logout">
                                            <a href="<?php echo wp_logout_url(get_permalink()); ?>">
                                                <?php _e('Cerrar Sesión') ?>
                                                <i class="icon icon-share icon-white"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                    </ul>

                    <form id="login-form" class="collapse navbar-form form-horizontal" method="post" action="<?php echo get_option('home'); ?>/wp-login.php">
                        <fieldset>
                            <div class="purple visible-desktop"><?php _e('Indique sus credenciales'); ?></div>
                            <input type="text" placeholder="Usuario" class="span12" id="log" name="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>">
                            <input type="password" placeholder="Password" class="span12" name="pwd" id="pwd"><br />
                            <button type="submit" class="btn iventia-btn iventia-btn-purple"><?php _e('OK') ?></button>
                            <p>
                                <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><?php _e('Recuérdame') ?></label>
                                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid iventia-nav-bottom">
	<h2>iventia blog</h2>
	<h3>Bienvenido al blog de empleo y eventos en tu ciudad</h3>
</div>