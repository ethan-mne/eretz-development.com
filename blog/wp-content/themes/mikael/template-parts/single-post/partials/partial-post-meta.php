<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<div class="vlt-post-meta">

	<span><?php the_author(); ?></span>

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php if ( mikael_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>
		<span><?php echo mikael_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
	<?php endif; ?>

</div>
<!-- /.vlt-post-meta -->