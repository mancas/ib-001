<?php get_header() ?>

	<div class="container">
		<div class="row-fluid boxshadow">
			<div class="span9">
				<?php query_posts(array('posts_per_page' => 10)); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); iventia_blog_post($post, 100); ?>
				<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); wp_reset_postdata(); ?>
		</div>
	</div><!-- .container -->

<?php 
	get_javascript();
	get_sidebar_script();
?>


</body>
</html>