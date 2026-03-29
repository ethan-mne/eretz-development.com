<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<h3 class="vlt-post-title">
<?php if ( is_sticky() ) { echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></span>'; } ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h3>
<!-- /.vlt-post-title -->