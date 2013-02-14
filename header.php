<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
	<head>
		<html xmlns:fb="http://www.facebook.com/2008/fbml">
		<meta http-equiv="Content-Type"  content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>"/>
		<title><?php wp_title('-', true, 'right'); echo wp_specialchars(get_bloginfo('name'), 1) ?></title>
		<meta name="author" content="Carlos" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/iventia.blog.css" />
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
                <a class="brand" href="iventia.me/app_dev.php/"><h1>Iventia <span>Jobs</span></h1></a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="iventia.me/app_dev.php/"><?php _e('Ofertas') ?></a></li>
                        <li><a href="#"><?php _e('Directory') ?></a></li>
                        <li><a href="#"><?php _e('Catálogo') ?></a></li>
                        <li><a href="<?php echo home_url(); ?>"><?php _e('Blog') ?></a></li>
                        <li><a href="#"><?php _e('Contacto') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid iventia-nav-bottom">
	<h2>iventia blog</h2>
	<h3>Bienvenido al blog de empleo y eventos en tu ciudad</h3>
</div>