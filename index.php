<?php get_header() ?>

	<div class="container">
		<div class="row-fluid boxshadow">
			<div class="span9">
				<?php query_posts('posts_per_page=5'); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); iventia_blog_post($post, 100); ?>
				<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</div>
			</div>
			<?php get_sidebar() ?>
		</div>
	</div><!-- .container -->

<?php 
	get_javascript();
	get_sidebar_script();
?>


</body>
</html>