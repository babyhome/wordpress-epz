<article class="post">
	<div class="post-content">
		<?php if( is_search() ) : ?>
			<p><?php _e( 'Sorry nothing found for your search term. Please try again with another term.', 'epz' ); ?></p>
			<?php 
			get_search_form();
			
		endif;
			
		?>
	</div>
</article>