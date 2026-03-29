<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', 'mikael' ); ?>" value="<?php echo get_search_query(); ?>">
	<button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button>
</form>
<!-- /.vlt-search-form -->