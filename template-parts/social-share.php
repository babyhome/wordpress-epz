<ul class="share-icons">
	<!-- twitter -->
	<li>
		<a href="https://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;"><i class="fa fa-twitter"></i></a>
	</li>
	
	<!-- facebook -->
	<li>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share', 'width=580,height=296');return false;"><i class="fa fa-facebook"></i></a>
	</li>
	
	<!-- google plus -->
	<li>
		<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;"><i class="fa fa-google-plus"></i></a>
	</li>
	
	<!-- pinterest -->
	<li>
		<!--<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>-->
		<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
		<a data-pin-do="none" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
	</li>
	
</ul>