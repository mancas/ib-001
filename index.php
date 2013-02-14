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

<?php get_javascript() ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.category').click(function(event){
			event.preventDefault();
			var trigger_parents = $(this).parents();
			var icon = $(this).children('i');

			$(this).toggleClass('purple');

			if ($(icon).hasClass('icon-chevron-right')) {
				$(icon).removeClass('icon-chevron-right').addClass('icon-chevron-down');
				$(trigger_parents[0]).next('li').children('ul').slideDown();
			} else {
				$(icon).removeClass('icon-chevron-down').addClass('icon-chevron-right');
				$(trigger_parents[0]).next('li').children('ul').slideUp();
			}
		})

	})
</script>

</body>
</html>