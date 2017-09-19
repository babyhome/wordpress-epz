
<article id="<?php the_id(); ?>" <?php post_class('post'); ?>>
	<?php if (is_sticky()): ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif; ?>
	
	<?php
	$quote_content 	= rwmb_meta( 'epz_quote_content', $args = array( 'type' => 'textarea' ), $post->ID );
	$quote_source_name 	= rwmb_meta( 'epz_quote_source_name', $args = array( 'type' => 'text' ), $post->ID );
	$quote_source_link 	= rwmb_meta( 'wpz_quote_source_link', $args = array( 'type' => 'text' ), $post->ID );
	$bg_image = 'style="background-image: url(' . esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ) . ');"';
	
	if( $quote_content != null ) : 
	?>
		<div class="featured-media no-header <?php if( !has_post_thumbnail()) echo 'no-image' ?>" <?php if( has_post_thumbnail()) echo $bg_image ?>>
			<blockquote>
				<p>
					<?php echo $quote_content; ?>
				</p>
				<?php if( $quote_source_name != null ) : ?>
					<?php if( $quote_source_link != null ) : ?>
						<cite><a href="<?php echo $quote_source_link; ?>"><?php echo $quote_source_name; ?></a></cite>
					<?php else : ?>
						<cite><?php echo $quote_source_name; ?></cite>
					<?php endif; ?>
				<?php endif; ?>
			</blockquote>
		</div>
	<?php endif; ?>

	
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





