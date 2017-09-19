
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
	$video_host_type 	= rwmb_meta( 'epz_video_host_type', $args = array( 'type' => 'radio' ), $post->ID );
	$video_self_hosted 	= rwmb_meta( 'epz_shvideo', $args = array( 'type' => 'file_advanced' ), $post->ID );
	if( $video_host_type == 'embeded' ) : ?>
		<div class="featured-media">
			<?php echo rwmb_meta( 'epz_video_embed_code', $args = array( 'type' => 'textarea' ), $post->ID ); ?>
		</div>
	<?php else : if( $video_host_type == 'selfhosted' && $video_self_hosted != null ) : ?>
		<div class="featured-media">
			<?php foreach( $video_self_hosted as $video ): ?>
				<?php echo do_shortcode( '[video src="' . $video['url'] . '"][/video]' ); ?>
			<?php endforeach; ?>
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





