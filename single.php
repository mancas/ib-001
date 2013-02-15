<?php get_header() ?>

	<div class="container">
		<div class="row-fluid boxshadow">
			<div class="span9">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
					<div class="iventia-post">
						<div class="iventia-block">
							<div class="iventia-post-header">
								<h3><?php the_title() ?></h3>
								<span class="purple"><?php the_date('d - m - Y') ?></span>
							</div><!-- .iventia-block-header -->
					
							<div class="content">
								<?php echo nl2br($post->post_content) ?>
							</div><!-- .content -->
						</div><!-- .iventia-block -->
					</div><!-- .iventia-blog -->

					<div class="iventia-post-comments">
						<?php comments_template('', true); ?>
					</div><!-- .iventia-post-comments -->
					
				<?php endwhile; endif;?>
			</div><!-- .sapn9 -->
			
			<?php get_sidebar() ?>
		
		</div><!-- .row-fluid -->
	</div><!-- .container -->
<?php 
	get_javascript();
	get_sidebar_script();
?>

</body>
</html>