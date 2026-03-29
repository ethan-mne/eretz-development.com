<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<div class="vlt-work-meta">

	<?php if ( mikael_get_post_taxonomy( get_the_ID(), 'portfolio_category' ) ) : ?>
		<span><?php echo mikael_get_post_taxonomy( get_the_ID(), 'portfolio_category', ', ' ); ?></span>
	<?php endif; ?>

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

</div>
<!-- /.vlt-work-meta -->