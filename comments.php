<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package Iventia
 * @subpackage Iventia
 * @since Iventia 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;


$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="comment-form-data controls controls-row">' .
                '<input placeholder="' . __( 'Nombre' ) . '" class="span4" id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . ' />'
                ,
    'email'  => '<input placeholder="' . __( 'Email' ) . '" class="span4" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />'
               ,
    'url'    => '<input placeholder="' . __( 'Website' ) . '" class="span4" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" /></div>' .
                '<!-- #<span class="hiddenSpellError" pre="">form-section-url</span> .form-section -->' ) ),
    
    'comment_field' => '<p class="comment-form-comment">' .
                '<label for="comment">' . __( 'Comentario' ) . '</label>' .
                '<textarea class="span12" id="comment" name="comment" cols="45" rows="8" tabindex="4" aria-required="true"></textarea>' .
                '</p><!-- #form-section-comment .form-section -->',
    'must_log_in' => '
<p class="must-log-in">' .  sprintf( __( 'Debes estar <a href="%s">logeado</a> para comentar.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>

',
    'logged_in_as' => '
<p class="logged-in-as">' . sprintf( __( 'Logueado como <a href="%s">%s</a>. <a title="Cerrar sesión" class="block-iventia-logout btn iventia-btn iventia-btn-grey" href="%s">Cerrar Sesión</a></p>

' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ),
    'comment_notes_before' => '<p class="comment-notes">' . __( 'Tu email <em>nunca</em> se publicará o se compartirá.' ) . '</p>',
    'comment_notes_after' => '',
    'id_form' => 'commentform',
    'id_submit' => 'comment-submit',
    'title_reply' => null,
    'title_reply_to' => __('Responder a %s'),
    'cancel_reply_link' => '<i title="' . __('Cancelar Responder a') . '" class="icon-remove-sign"></i>',
    'label_submit' => __( 'Comentar' ),
);

?>

<div id="comments" class="comments-area">
	<div class="iventia-block">
		<h2 class="comments-title">
			Comentarios
		</h2>
		<?php if ( have_comments() ) : ?>
			<ul class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'get_html_comments', 'style' => 'ul') ) ?>
			</ul><!-- .commentlist -->
            <div class="paginate">
                <?php paginate_comments_links(array('prev_text' => '<i class="icon-chevron-left"></i>', 'next_text' => '<i class="icon-chevron-right"></i>')) ?>
            </div>
		<?php else: // have_comments() ?>
			<div class="content">
				<p>No hay comentarios. ¡Se el primero en comentar!</p>
			</div>	
		<?php endif; ?>
	</div><!-- .iventia-block -->
	<div class="iventia-block">
		<h2 class="comments-title">
			Deja tu comentario
		</h2>
		<div class="content">
		<?php comment_form($defaults); ?>
		</div>
	</div>
</div><!-- #comments .comments-area -->




<?php 
    get_javascript();
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#comment-submit').addClass('btn iventia-btn iventia-btn-purple');
	})
</script>