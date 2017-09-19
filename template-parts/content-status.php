
<article id="<?php the_id(); ?>" <?php post_class('post'); ?>>
	<?php if (is_sticky()): ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif; ?>
	
	<div class="post-head">
		<p>&mdash; <em><span class="date text-uppercase"><?php the_time( get_option( 'date_format' ) ); ?></span></em> &mdash;</p>
		<h2 class="post-title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<span class="category-list"><?php the_category( ',&nbsp' ); ?></span>
			<?php if(comments_open() && !post_password_required()) : ?>
				| <span class="comment-count"><?php comments_popup_link( __('0 Comments', 'futura'), __('1 Comment', 'futura'), __('% Comments', 'epz')); ?></span>
			<?php endif; ?>
		</div>
	</div>
	
	<?php
	$status_type 	= rwmb_meta( 'epz_status_type', $args = array( 'type' => 'radio' ), $post->ID );
	$status_link 	= rwmb_meta( 'epz_status_link', $args = array( 'type' => 'text' ), $post->ID );
	$bg_image 	= 'style="background-image: url(' . esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ) . ');"';
	if( $status_type == 'twitter' && $status_link != null ) : ?>
		<div class="featured-media status-wrap <?php if (!has_post_thumbnail()) echo 'no-image' ?>" <?php if ( has_post_thumbnail()) echo $bg_image; ?>>
			<blockquote class="twitter-tweet"><a href="<?php echo $status_link; ?>"></a></blockquote>
		</div>
	<?php else: if ( $status_type == 'facebook' && $status_link != null ) : ?>
		<div class="featured-media status-wrap <?php if( !has_post_thumbnail()) echo 'no-image' ?>" <?php if( has_post_thumbnail()) echo $bg_image ?>>
			<div class="fb-post" data-width="500" data-href="<?php echo $status_link; ?>"></div>
			<div id="fb-root"></div>
		</div>
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
			<?php the_tags( __( 'Tagged in:', 'epz' ), ', ', '' ); ?>
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





