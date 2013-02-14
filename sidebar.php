			<div class="span3">
				<div class="iventia-block">
					<h2>Categorías</h2>
					<div class="content">
						<ul class="nav iventia-categories">
							<?php $categories_ids = get_all_category_ids(); ?>
							<?php foreach ($categories_ids as $category_id) { ?>
								<li><a href='#' class="category"><i class='icon-chevron-right'></i> <?php echo get_cat_name($category_id) ?></a></li>
								<li>
									<ul class="nav ml20 hide">
										<?php $posts = get_posts(array('category' => $category_id)); ?>
										<?php if (empty($posts)){ ?>
											<li><p>No hay entradas en esta categoría</p></li>
										<?php } else { ?>
											<?php foreach ($posts as $post) { ?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span>(<?php echo count(get_comments(array('post_id' => $post->ID))) ?>)</span></a></li>
											<?php } } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</div><!-- .content -->
				</div><!-- .iventia-block -->

				<div class="iventia-block mt20">
					<h2>Anuncios</h2>
					<div class="content">
						<img alt="salon de turismo sitc" src="<?php bloginfo('template_directory') ?>/img/iventia-anuncio.jpg">
						<h4 class="purple">Salón de Turismo SITC</h4>
						<p class="light-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue nisl ac orci accumsan 
							mollis...<b>Acceder</b></p>
					</div><!-- .content -->
				</div><!-- .iventia-block -->
			</div><!-- .span3 -->