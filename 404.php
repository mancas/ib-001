<?php get_header(); ?>

<div class="container">
		<div class="row-fluid boxshadow">
			<div class="span9">
				<div class="iventia-block">
					<div class="iventia-post-header">
						<h3>Oops! No encontramos lo que buscas</h3>
					</div><!-- .iventia-post-header -->
					<div class="content">
						<p>La dirección a la que intentas acceder no se encuentra disponible en este momento o no existe.
							Asegurate de que has escrito bien la dirección. Puedes volver a la página principal desde <a href="<?php echo home_url() ?>">aquí</a>
					</div>	
				</div><!-- .iventia-block -->
			</div><!-- .span9 -->
			<?php get_sidebar(); ?>
		</div><!-- .row-fluid .boxshadow -->
	</div><!-- .container -->
<?php 
	get_javascript();
	get_sidebar_script();
?>