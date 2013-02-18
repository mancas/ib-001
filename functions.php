<?php

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  	array_pop($words);

  return implode(' ', $words);
}

function iventia_blog_post($post, $limit = 300)
{
	$post_date = mysql2date('d - m - Y', $post->post_date);
	$image_html = get_image_from_post($post);

	$post_text = string_limit_words(strip_tags($post->post_content), $limit) . "...  <a class=\"purple\" href=\"" . get_permalink($post) . "\">Leer más</a>";

	$post_structure = "<div class=\"iventia-post\">
					<div class=\"iventia-block\">
						<div class=\"iventia-post-header\">
							<h3><a href=\"" . get_permalink($post) . "\" title=\"Leer Más\">" . $post->post_title . "</a></h3>
							<span class=\"purple\">" . $post_date . "</span>
						</div><!-- .iventia-post-header -->

						<div class=\"content\">" .
							$image_html
							. "<p>" . $post_text . "</p>
							<div class=\"iventia-post-footer\">
								<p>Comentarios: <span class=\"purple\">". count(get_comments(array('post_id' => $post->ID))) ."</span></p>
								<div class=\"al post-category\"><p>Posteado en: " . print_categories_in_line(get_the_category($post->ID)) . "</p><div class=\"ar post-social\">" . print_social_icons($post) . "</div></div>
							</div><!-- iventia-post-footer -->
						</div><!-- .content -->
					</div><!-- .iventia-block -->
				</div><!-- .iventia-post -->";

	print($post_structure);
}

function print_categories_in_line($categories, $class = "purple")
{
	$categories_list = "<span class=\"" . $class . "\">";

	$last_item = end($categories);
	foreach ($categories as $category) {
		$cat_name = get_cat_name($category->term_id);
		
		if ($last_item == $category) {
			$categories_list .= "<a href=\"" . get_category_link($category->term_id) . "\" title=\"" . $cat_name . "\">" . $cat_name . "</a>";
		} else {
			$categories_list .= "<a href=\"" . get_category_link($category->term_id) . "\" title=\"" . $cat_name . "\">" . $cat_name . "</a> , ";
		}	
	}

	return $categories_list . "</span>";

}

function print_social_icons($post)
{
	$post_url = esc_url(get_permalink($post));

	$facebook_url = "http://www.facebook.com/sharer/sharer.php?u=" . $post_url;
	$twitter_url = "http://twitter.com/home?status=" . $post->post_title . " " . $post_url;
	$google_url = "http://plus.google.com/sharer?url=" . $post_url;

	$social_icons = "<a class=\"social-icons social-icons-facebook\" href=\"" . $facebook_url . "\" title=\"Compartir en Facebook\" target=\"_blank\"></a>\n"
					. "<a class=\"social-icons social-icons-twitter\" href=\"" . $twitter_url . "\" title=\"Compartir en Twitter\" target=\"_blank\"></a>\n"
					. "<a class=\"social-icons social-icons-google_plus\" href=\"" . $google_url . "\" title=\"Compartir en Goolgle+\" target=\"_blank\"></a>\n";
	return $social_icons;
}

function get_image_from_post($post, $print = false)
{
	$images = get_posts(array('post_parent' => $post->ID, 'post_type' => 'attachment', 'numberposts' => -1, 'post_mime_type' => 'image','exclude' => $thumb_ID));
	$image_html = "";

	if ($images) {
		$image = $images[0];
		$image_html = "<div class=\"iventia-post-photo\">\n" . wp_get_attachment_image($image->ID, 'large') . "</div><!-- .iventia-post-photo -->\n";
	}

	if ($print) {
		print($image_html);
	} else {
		return $image_html;
	}
}

function get_html_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	$hasPermission = $comment->comment_approved;

	if ($hasPermission) {
		$comment_data = $comment->comment_content;
	} else {
		$comment_data = "Tu comentario esta a la espera de moderación";
	}

	$html = "<li class=\"" . $comment->comment_ID . "\">
				<div class=\"comment-author\">\n" . get_avatar($comment,48) . "\n
					<em>" . get_comment_author_link() . "</em>
					<span class=\"comment-date purple\">"
						. get_comment_date('d M Y') .
					"</span><!-- .comment-date -->
				</div><!-- .comment-author -->
				<p class=\"comment-data\">"
					. $comment_data .
				"</p><!-- .comment-data -->"
					. get_comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) .
				"</li>";

	print($html);
}

function get_jquery($print = true)
{
	$path = get_bloginfo('template_directory');
	if ($print) {
		print("<script type=\"text/javascript\" src=\"$path/js/jquery-1.8.3.min.js\"></script>");
	} else {
		return "<script type=\"text/javascript\" src=\"$path/js/jquery-1.8.3.min.js\"></script>";
	}
}

function get_bootstrap($print = true)
{
	$path = get_bloginfo('template_directory');
	if ($print) {
		print("<script type=\"text/javascript\" src=\"$path/js/bootstrap.min.js\"></script>");
	} else {
		return "<script type=\"text/javascript\" src=\"$path/js/bootstrap.min.js\"></script>";
	}
}

function get_javascript()
{
	if(function_exists('get_jquery') && function_exists('get_bootstrap')) {
		get_jquery();
		get_bootstrap();
	}
}

function get_sidebar_script($print = true)
{
	$script = "<script type=\"text/javascript\">
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
		});
	});
</script>";

	if ($print) {
		print($script);
	} else {
		return $script;
	}
}

?>