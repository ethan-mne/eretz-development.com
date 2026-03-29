
<?php

	// Elementor `footer` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		get_template_part( 'template-parts/footer/footer' );
	}

?>

<?php if ( mikael_get_theme_mod( 'popup_cf7_shortcode' ) ) : ?>

	<div class="modal fade" id="vlt-contact-form" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="<?php esc_html_e( 'Close', 'mikael' ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</button>
					<?php echo do_shortcode( html_entity_decode( mikael_get_theme_mod( 'popup_cf7_shortcode' ) ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /.modal -->

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>