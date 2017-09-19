<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epz
 */

?>

<article id="<?php the_id(); ?>" <?php post_class( 'post' ); ?>>
	<?php if( is_sticky() ) : ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif; ?>
	
	<div class="post-head">
		<p>&mdash; <em><span class="date text-uppercase"><?php the_time( get_option( 'date_format' ) ); ?></span></em> &mdash;</p>
		<h2 class="post-title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<span><?php the_category( ',&nbsp' ); ?></span>
			<?php if( comments_open() && !post_password_required() ) : ?>
				| <span class="comment-count"><?php comments_popup_link( __( '0 Comments', 'epz' ), __( '1 Comment', 'epz' ), __( '% Comments', 'epz' ) ); ?></span>
			<?php endif; ?>
		</div>
	</div>
	
	<?php if( has_post_thumbnail() ) : ?>
		<div class="featured-media">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php endif; ?>
	<div class="post-content">
		<?php is_single() ? the_content() : the_excerpt() ?>
		
		<?php 
		wp_link_pages( array(
			'before' 			=> '<nav class="pagination align-left">',
			'after' 			=> '</nav>',
			'link_before' 		=> '',
			'link_after' 		=> '',
			'next_or_number' 	=> 'page',
			'nextpagelink' 		=> '<i class="fa fa-angle-right"></i>',
			'previouspagelink' 	=> '<i class="fa fa-angle-left"></i>',
		));
		?>
	</div>
	<?php if( is_single() && has_tag() ) : ?>
		<div class="tag-list">
			<?php the_tags( __( 'Tagged:', 'epz' ), ', ', '' ); ?>
		</div>
	<?php endif; ?>
	<footer class="post-footer clearfix">
		<div class="pull-left">
			<span class="author"><?php _e( '<em>By</em>', 'epz' ); ?> <?php the_author_posts_link(); ?></span>
		</div>
		<div class="pull-right share">
			<?php get_template_part( 'template-parts/social-share') ?>
		</div>
	</footer>
</article>



