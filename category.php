<?php get_header(); ?>

	<div class="container">
		<div class="row-fluid boxshadow">
			<div class="span9">
				<div class="iventia-block-category">
					<div class="iventia-post-header">
						<h3>
							<ul class="breadcumb">
								<li><span class="icon-home"></span><a class="grey" title="Inicio" href="<?php echo home_url(); ?>">Iventia-Blog</a></li>
								<li><span>/</span></li>
								<li class="purple"><?php echo single_cat_title() ?></li>
							</ul></h3>
					</div><!-- .iventia-post-header -->
				</div><!-- .iventia-block -->
				<?php if ( have_posts() ) : ?>
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						iventia_blog_post($post, 100);
					endwhile;
				?>
				<?php endif; ?>
			</div><!-- .span9 -->
			<?php get_sidebar(); ?>
		</div><!-- .row-fluid .boxshadow -->
	</div><!-- .container -->
<?php 
	get_javascript();
	get_sidebar_script();
?>