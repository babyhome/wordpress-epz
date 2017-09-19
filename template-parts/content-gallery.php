
<article id="<?php the_id(); ?>" <?php post_class('post'); ?>>
	<?php if( is_sticky() ) : ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif;?>
	
	<?php 
	$gallery_type = rwmb_meta( 'epz_gallery_type', $args = array('type' => 'radio'), $post->ID );
	$gallery_images = rwmb_meta( 'epz_gallery_images', $args = array( 'type' => 'file_advanced' ), $post->ID );
	
	?>
	
	<div class="post-head">
		<p>&mdash; <em><span class="date text-uppercase"><?php the_time( get_option( 'date_format' ) ); ?></span></em> &mdash;</p>
		<h2 class="post-title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<span class="category-list"><?php the_category( ',&nbsp' ); ?></span>
			<?php if( comments_open() && !post_password_required() ) : ?>
				| <span class="comment-count"><?php comments_popup_link( __('0 Comments', 'epz' ), __( '1 Comment', 'epz' ), __( '% Comments', 'epz' ) ); ?></span>
			<?php endif; ?>
		</div>
	</div>
	
	<!-- gallery slider -->
	<?php if( !empty( $gallery_images ) && $gallery_type == 'slider' ) : ?>
		<div class="featured-media">
			<div class="flexslider gallery-slides">
				<ul class="slides">
					<?php foreach( $gallery_images as $image ) : ?>
						<li>
							<?php echo wp_get_attachment_image( $image['ID'], 'post-thumbnail' ) ?>
							<?php 
							$attachment = get_post( $image['ID']);
							$image_caption = $attachment->post_excerpt;
							
							if( $image_caption != null ) : ?>
								<p class="flex-caption"><?php echo $image_caption; ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
	</div><!-- .featured-media -->
	
	<!-- .tiled slider -->
	<?php else : if (!empty($gallery_images) && $gallery_type == 'tiled') : ?>
		<div class="featured-media">
			<div class="gallery-tiled magnific-popup-gallery">
				<ul>
					<?php foreach ($gallery_images as $image): ?>
						<li>
							<?php 
							$attachment = get_post( $image['ID'] );
							$image_caption = $attachment->post_excerpt;
							?>
							<a href="<?php echo $image['url'] ?>" <?php if ($image_caption != null ): ?> data-caption="<?php echo $image_caption; ?>" <?php endif; ?>>
								<?php echo wp_get_attachment_image( $image['ID'], 'small_tile' ); ?>
								<div class="overlay"></div>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div><!-- .featured-media -->
	
	<?php endif; endif; ?>
	
	<div class="post-content">
		<?php is_single() ? the_content() : the_excerpt() ?>
		
		<?php wp_link_pages( array(
				'before'           => '<nav class="pagination align-left">',
				'after'            => '</nav>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'page',
				'nextpagelink'     => '<i class="fa fa-angle-right"></i>',
				'previouspagelink' => '<i class="fa fa-angle-left"></i>',
			) ); ?>
	</div>
	
	<?php if( is_single() && has_tag() ) : ?>
		<div class="tag-list">
			<?php the_tags( __( 'Tagged:', 'epz' ), ', ', '' ); ?>
		</div>
	<?php endif; ?>
	
	<footer class="post-footer clearfix">
		<div class="pull-left">
			<span class="author"><?php _e( 'By', 'epz' ) ?> <?php the_author_posts_link(); ?></span>
		</div>
		<div class="pull-right share">
			<?php get_template_part( 'template-parts/social-share' ); ?>
		</div>
	</footer>
	
	
</article>




